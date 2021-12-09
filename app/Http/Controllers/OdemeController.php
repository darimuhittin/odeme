<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Odeme;
use App\Models\Cari;

class OdemeController extends Controller
{
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

    public function complete_pay()
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
                'DealerCode' => 'mokadan verilen bayii kodu (string)',
                'Username' => 'mokadan verilen api kullanici adi (string)',
                'Password' => 'mokadan verilen api sifresi (string)',
                'CheckKey' => 'Kontrol anahtarı (DealerCode + "MK" + Username + "PD" + Password) String olarak birleştirilen bu bilgilerin SHA-256 hash algoritmasından geçirilmesiyle oluşturulur.
                Buraya tıklayarak deneme ekranına gidebilirsiniz.'
            ],
            'PaymentDealerRequest' => [
                'CardHolderFullName' => $val['fullname'],
                'CardNumber' => $val['cardnumber'],
                'ExpMonth' => $val['month'],
                'ExpYear' => $val['year'],
                'CvcNumber' => $val['cvc'],
                'CardToken' => '',
                'Amount' => '',
                'Currency' => '',
                'InstallmentNumber' => '',
                'ClientIP' => '',
                'OtherTrxCode' => '',
                'SubMerchantName' => '',
                'IsPoolPayment' => '',
                'IsTokenized' => '',
                'IntegratorId' => '',
                'Software' => '',
                'Description' => '',
                'IsPreAuth' => '',
            ]
        ];

        ddd($val);
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
