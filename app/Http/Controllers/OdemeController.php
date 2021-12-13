<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Odeme;
use App\Models\Cari;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class OdemeController extends Controller
{
    private $url = 'https://service.refmoka.com/PaymentDealer/DoDirectPaymentThreeD';
    //
    public function index()
    {
        return "show all";
    }

    public function show(Odeme $odeme)
    {
        return view('odemeler.show', [
            'odeme' => $odeme
        ]);
    }

    public function pay(Odeme $odeme)
    {
        return view('odemeler.tamamla', [
            'odeme' => $odeme
        ]);
    }

    public function complete_pay(Odeme $odeme)
    {
        $val = request()->validate([
            'fullname' => ['min:3', 'max:255', 'required'],
            'cardnumber' => ['min:3', 'max:255', 'required'],
            'month' => ['required'],
            'year' => ['required'],
            'cvc' => ['digits:3', 'required'],
            'amount' => ['required'],
        ]);

        $arr = [
            'PaymentDealerAuthentication' => [
                'DealerCode' => '16832', //bayi kodu string
                'Username' => 'darimuhittin@gmail.com', //'mokadan verilen api kullanici adi (string)',
                'Password' => '139addd80e24', //'mokadan verilen api sifresi (string)',
                'CheckKey' => Hash::make('16832' . 'MK' . 'darimuhittin@gmail.com' . 'PD' . '139addd80e24'), //'Kontrol anahtarı (DealerCode + "MK" + Username + "PD" + Password) String olarak birleştirilen bu bilgilerin SHA-256 hash algoritmasından geçirilmesiyle oluşturulur.'
            ],
            'PaymentDealerRequest' => [
                'CardHolderFullName' => $val['fullname'],
                'CardNumber' => $val['cardnumber'],
                'ExpMonth' => $val['month'],
                'ExpYear' => $val['year'],
                'CvcNumber' => $val['cvc'],
                'CardToken' => '',
                'Amount' => $val['amount'],
                'Currency' => '',
                'InstallmentNumber' => '',
                'ClientIP' => request()->server('SERVER_ADDR'),   // IP
                'OtherTrxCode' => '',
                'SubMerchantName' => 'EKSTRE ISMI',
                'IsPoolPayment' => 0,
                'IsPreAuth' => 0,
                'IsTokenized' => 0,
                'IntegratorId' => '',
                'Software' => 'DARISOFT',
                'Description' => $odeme->aciklama,
                'ReturnHash' => 1,
                'RedirectUrl' => 'www.darisoft.com/odemeler/' . $odeme->kod . '/sonuc', // redirect
                'RedirectType' => 0,
                'BuyerInformation' => [],
                'BasketProduct' => [],
                'CustomerInformation' => [],
            ]
        ];

        $res = Http::post($this->url, $arr);

        ddd($res);
        if ($res['ResultCode'] == 'Success') {
            Redirect::away($res['Data']);
        }
    }

    public function sonuc(Odeme $odeme)
    {
    }
    public function create(Cari $cari)
    {
        return view('admin.create-odeme', [
            'cari' => $cari
        ]);
    }

    public function store(Cari $cari)
    {
        $faker = \Faker\Factory::create();
        Odeme::create([
            'kod' => $faker->regexify('[A-Z]{16}'),
            'aciklama' => request('açıklama'),
            'tutar' => request('tutar'),
            'cari_id' => $cari->id
        ]);

        return redirect('/admin/cariler')->with('message', 'Ödeme oluşturma başarılı.');
    }
}
