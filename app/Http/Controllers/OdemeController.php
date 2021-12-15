<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Odeme;
use App\Models\Cari;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;

class OdemeController extends Controller
{
    private $url = 'https://service.refmoka.com/PaymentDealer/DoDirectPaymentThreeD';
    //
    public function index()
    {
        return view('admin.odemeler', [
            'odemeler' => Odeme::all()
        ]);
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

        // $odeme['odendi_mi'] = true;

        // $odeme->save();

        // return redirect('/odemeler/' . $odeme->kod . '/sonuc');
        $arr = [
            'PaymentDealerAuthentication' => [
                'DealerCode' => '16832', //bayi kodu string
                'Username' => 'darimuhittin@gmail.com', //'mokadan verilen api kullanici adi (string)',
                'Password' => 'd091cfaf8ddd', //'mokadan verilen api sifresi (string)',
                'CheckKey' => 'd4e2b06bb4a820341f1d3845f8f0d63acce4495c4cc698630646decb37aa73ff', //'Kontrol anahtarı (DealerCode + "MK" + Username + "PD" + Password) String olarak birleştirilen bu bilgilerin SHA-256 hash algoritmasından geçirilmesiyle oluşturulur.'
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
                // 'BuyerInformation' => [],
                // 'BasketProduct' => [],
                // 'CustomerInformation' => [],
            ]
        ];
        $arr = json_encode($arr);

        ddd($arr);
        $client = new Client([
            'headers' => ['Content-Type' => 'application/json']
        ]);

        $res = $client->post($this->url, [
            'body' => $arr
        ]);

        $res = json_decode($res->getBody(), true);
        // $res = Http::post($this->url, $arr);



        dd($res);
        if ($res['ResultCode'] == 'Success') {
            Redirect::away($res['Data']);
        }



        // LETS SAY IT'S OK.


    }

    public function sonuc(Odeme $odeme)
    {
        return view('odemeler.sonuc', [
            'odeme' => $odeme
        ]);
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
