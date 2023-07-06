<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalForm;
use App\Models\ConfigAddress;
use App\Services\GeneralFormService;


class GeneralFormController extends Controller
{
    protected $generalFormService;

    public function __construct(GeneralFormService $generalFormService)
    {
        $this->generalFormService = $generalFormService;
    }
    
    // public function addGlobalForm(Request $request) {
    //     $data = $request->all();
    //     $formAm = new GlobalForm();
    //     $formAm->am = json_encode($data);
    //     $formAm->save();

    // }

    public function getAddedFields () {
        $form = GlobalForm::findorFail(1);

        $form->am = json_decode($form->am);
        $form->ru = json_decode($form->ru);
        $form->en = json_decode($form->en);
        return response()->json($form);
    }

    public function createAddress(Request $request) {
      $data = $request->all();
      $newAddress = new ConfigAddress();
      $newAddress->am = $data['am']['value'];
      $newAddress->ru = $data['ru']['value'];
      $newAddress->en = $data['en']['value'];
      $newAddress->addressId = $data['am']['id'];
      $newAddress->communityId = $data['am']['communityId'];
      $newAddress->save();
      $address = ConfigAddress::all();
      return response()->json($address);
    }

    public function getAddress () {
      $address = ConfigAddress::all();
      return response()->json($address);
    }

    public function getAddressForStructure () {
      $address =  \DB::table('config_addresses')
      ->select(\DB::raw('id as addressId, am as value, addressId as id, communityId, am as name'))
      ->get();
      return response()->json($address);
    }

    public function deleteAddress (Request $request) {
      $id = $request->all();
      $item = ConfigAddress::find($id['id']);
      if (!$item) {
          return response()->json(['message' => 'Address not found'], 404);
      }
      $item->delete();
      $address = ConfigAddress::all();
      return response()->json($address);
    }
    

    public function getFormStructure() {
      $form = GlobalForm::findorFail(1);
      $form->am = json_decode($form->am);

      return response()->json($form->am);
    }

    public function addGlobalFormField(Request $request) {
        $data = $request->all();
        $this->generalFormService->addGeneralField($data);
        return json_decode(GlobalForm::findorFail(1)->am);
    }

    public function removeGlobalFormField(Request $request) {
        $data = $request->all();
        $this->generalFormService->removeGeneralField($data);
        return json_decode(GlobalForm::findorFail(1)->am);
    }

    public function getAllAddresses($id) {
      $address = [];
      if($id) {
        $address = ConfigAddress::where('communityId', $id)->get();
      }else {
        $address = ConfigAddress::all();
      }
      $address->prepend( [ 
        "id" => 1,
        "communityId" => 0,
        "addressId" => "streetAddress",
        "am" => "Ընտրեք"
       ]);
      if($id == 1) {
       $address = [ 
        "id" => 1,
        "communityId" => 0,
        "addressId" => "streetAddress",
        "am" => "Լրացրեք համայնքը"
       ];
      }
     
      return response()->json($address);
    }

    public function getAllStructure() {
      $form = GlobalForm::findorFail(1);
      $form->am = json_decode($form->am);
      $str = $form->am;
      // $form->ru = json_decode($form->ru);
      // $form->en = json_decode($form->en);
      // return response()->json($form);
      // $str = [
      //   [
      //     'name' => "announcement",
      //     'title'=> "Հայտարարություն",
      //     'added'=> [],
      //     "fields" => [
      //       [
      //         "key" => "transactionType",
      //         "title" => "ԳՈՐԾԱՐՔԻ ՏԵՍԱԿ*",
      //         "type" => "select",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> 1,
      //             "name"=> "Ընտրեք տեսակը",
      //             "value" => "",
      //             "getOptionName" => ""
      //           ],
      //           [
      //             "id"=> 2,
      //             "name"=> "Վաճառք",
      //             "value" => "Վաճառք",
      //             "getOptionName" => "sale"
      //           ],
      //           [
      //             "id"=> 3,
      //             "name"=> "Վարձակալություն",
      //             "value" => "Վարձակալություն",
      //             "getOptionName" => "rent"
      //           ]
      //         ]
      //       ],
      //       [
      //         "key" => "propertyType",
      //         "title" => "ԳՈՒՅՔԻ ՏԵՍԱԿ*",
      //         "type" => "select",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> 1,
      //             "name"=> "Ընտրեք տեսակը",
      //             "value" => "",
      //             "getOptionName" => ""
      //           ],
      //           [
      //             "id"=> 2,
      //             "name"=> "Բնակարան",
      //             "value" => "Բնակարան",
      //             "getOptionName" => "house"
      //           ],
      //           [
      //             "id"=> 3,
      //             "name"=> "Առանձնատուն",
      //             "value" => "Առանձնատուն",
      //             "getOptionName" => "privateHouse"
      //           ],
      //           [
      //             "id"=> 4,
      //             "name"=> "Կոմերցիոն (առանձնատուն)",
      //             "value" => "Կոմերցիոն (առանձնատուն)",
      //             "getOptionName" => "commercialHouse"
      //           ],
      //           [
      //             "id"=> 5,
      //             "name"=> "Կոմերցիոն (բնակարան)",
      //             "value" => "Կոմերցիոն (բնակարան)",
      //             "getOptionName" => "commercialApartment"
      //           ],
      //         ]
      //       ],
      //       [
      //         "key" => "announcementTitle",
      //         "title" => "ՀԱՅՏԱՐԱՐՈՒԹՅԱՆ ՎԵՐՆԱԳԻՐ*",
      //         "type" => "text",
      //         "style" => "629px",
      //         "value" => '',
      //         "option" => []
      //       ],
      //       [
      //         "key" => "announcementDesc",
      //         "title" => "ՀԱՅՏԱՐԱՐՈՒԹՅԱՆ ՆԿԱՐԱԳՐՈՒԹՅՈՒՆ*",
      //         "type" => "text",
      //         "style" => "629px",
      //         "value" => '',
      //         "option" => []
      //       ],
      //      [
      //       "key" => "announcementType",
      //       "title" => "ՀԱՅՏԱՐԱՐՈՒԹՅԱՆ ՏԵՍԱԿ*",
      //       "type" => "select",
      //       "style" => "306px",
      //       "value" => '',
      //       "option" => [
      //         [
      //           "id"=> 1,
      //           "name"=> "Ընտրեք տեսակը",
      //           "value" => "",
      //           "getOptionName" => ""
      //         ],
      //         [
      //           "id"=> 2,
      //           "name"=> "Հասարակ",
      //           "value" => "Հասարակ",
      //           "getOptionName" => "simple"
      //         ],
      //         [
      //           "id"=> 3,
      //           "name"=> "Տոպ",
      //           "value" => "Տոպ",
      //           "getOptionName" => "top"
      //         ],
      //         [
      //           "id"=> 4,
      //           "name"=> "Շտապ",
      //           "value" => "Շտապ",
      //           "getOptionName" => "urgent"
      //         ],
      //       ]
      //     ],
      //     ]
      //   ],
      //   [
      //     'name' => "location",
      //     'title'=> "Գտնվելու Վայրը - Երևան",
      //     'added'=> [],
      //     "fields" => [
      //       [
      //         "key" => "community",
      //         "title" => "Համայնք*",
      //         "type" => "select",
      //         "style" => "629px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> 1,
      //             "name"=> "Ընտրեք",
      //             "value" => "",
      //             "getOptionName" => ""
      //           ],
      //           [
      //             "id"=> 2,
      //             "name"=> "Աջափնյակ",
      //             "value" => "Աջափնյակ",
      //             "getOptionName" => "ajapnyak"
      //           ],
      //           [
      //             "id"=> 3,
      //             "name"=> "Արաբկիր",
      //             "value" => "Արաբկիր",
      //             "getOptionName" => "arabkir"
      //           ],
      //           [
      //             "id"=> 4,
      //             "name"=> "Ավան",
      //             "value" => "Ավան",
      //             "getOptionName" => "avan"
      //           ],
      //           [
      //             "id"=> 5,
      //             "name"=> "Դավթաշեն",
      //             "value" => "Դավթաշեն",
      //             "getOptionName" => "davtashen"
      //           ],
      //           [
      //             "id"=> 6,
      //             "name"=> "Էրեբունի",
      //             "value" => "Էրեբունի",
      //             "getOptionName" => "erebuni"
      //           ],
      //           [
      //             "id"=> 7,
      //             "name"=> "Քանաքեռ-Զեյթուն",
      //             "value" => "Քանաքեռ-Զեյթուն",
      //             "getOptionName" => "zeytun"
      //           ],
      //           [
      //             "id"=> 8,
      //             "name"=> "Կենտրոն",
      //             "value" => "Կենտրոն",
      //             "getOptionName" => "kentron"
      //           ],
      //           [
      //             "id"=> 9,
      //             "name"=> "Մալաթիա-Սեբաստիա",
      //             "value" => "Մալաթիա-Սեբաստիա",
      //             "getOptionName" => "malatia"
      //           ],
      //           [
      //             "id"=> 10,
      //             "name"=> "Նորք-Մարաշ",
      //             "value" => "Նորք-Մարաշ",
      //             "getOptionName" => "norqMarash"
      //           ],
      //           [
      //             "id"=> 11,
      //             "name"=> "Նոր Նորք",
      //             "value" => "Նոր Նորք",
      //             "getOptionName" => "norNorq"
      //           ],
      //           [
      //             "id"=> 12,
      //             "name"=> "Նուբարաշեն",
      //             "value" => "Նուբարաշեն",
      //             "getOptionName" => "nubarashen"
      //           ],
      //           [
      //             "id"=> 13,
      //             "name"=> "Շենգավիթ",
      //             "value" => "Շենգավիթ",
      //             "getOptionName" => "shengavit"
      //           ],
      //           [
      //             "id"=> 14,
      //             "name"=> "Վահագնի թաղամաս",
      //             "value" => "Վահագնի թաղամաս",
      //             "getOptionName" => "vahagni"
      //           ],
      //           [
      //             "id"=> 15,
      //             "name"=> "Այլ",
      //             "value" => "Այլ",
      //             "getOptionName" => "other"
      //           ]
      //         ]
      //       ],
      //       [
      //         "key" => "street",
      //         "title" => "Փողոց*",
      //         "type" => "select",
      //         "style" => "283px",
      //         "value" => '',
      //         "option" => []
      //       ],
      //       [
      //         "key" => "building",
      //         "title" => "Շենք*",
      //         "type" => "inputNumber",
      //         "style" => "100px",
      //         "value" => '',
      //         "option" => []
      //       ],
      //       [
      //         "key" => "entrance",
      //         "title" => "Մուտք*",
      //         "type" => "inputNumber",
      //         "style" => "100px",
      //         "value" => '',
      //         "option" => []
      //       ],
      //       [
      //         "key" => "apartment",
      //         "title" => "Բնակարան*",
      //         "type" => "inputNumber",
      //         "style" => "100px",
      //         "value" => '',
      //         "option" => []
      //       ],
      //       [
      //         "key" => "map",
      //         "title" => "MAP PIN*",
      //         "type" => "map",
      //         "style" => "631px",
      //         "value" => '',
      //         "option" => []
      //       ],
      //       [
      //         "key" => "realAddress",
      //         "title" => "Իրական հասցե*",
      //         "type" => "inputText",
      //         "style" => "629px",
      //         "placeholder" => "Հասցե",
      //         "value" => '',
      //         "option" => []
      //       ],
      //     ]
      //   ],
      //   [
      //     'name' => "price",
      //     'title'=> "Գինը",
      //     'added'=> [
      //       [
      //         "key" => "priceAdded",
      //         "title" => "Ավել Գինը*",
      //         "type" => "inputText",
      //         "style" => "width:80%",
      //         "value" => '',
      //         "option" => []
      //       ],
      //     ],
      //     "fields" => [
      //       [
      //         "key" => "totalPrice",
      //         "title" => "Ընդհանուր գինը*",
      //         "type" => "inputNumberSymbol",
      //         "style" => "202px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> "priceUsd",
      //             "name"=> "Գինը դոլարով",
      //             "symbol"=>'usd',
      //             "value" => ""
      //           ],
      //           [
      //             "id"=> "priceAmd",
      //             "name"=> "Գինը դրամով",
      //             "symbol"=>'amd',
      //             "value" => ""
      //           ],
      //           [
      //             "id"=> "priceRub",
      //             "name"=> "Գինը ռուբլիով",
      //             "symbol"=>'rub',
      //             "value" => ""
      //           ]
      //         ]
      //       ],
      //       [
      //         "key" => "priceNegotiable",
      //         "title" => "Գինը պայմանագրային",
      //         "type" => "checkbox",
      //         "style" => "",
      //         "value" => '',
      //         "option" => [
      //           "status" => false
      //          ]
      //       ],
      //       [
      //         "key" => "sqmPrice",
      //         "title" => "Գինը 1 քմ*",
      //         "type" => "inputNumberSymbol",
      //         "style" => "202px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> "sqmPriceUsd",
      //             "name"=> "Գինը դոլարով",
      //             "symbol"=>'usd',
      //             "value" => ""
      //           ],
      //           [
      //             "id"=> "sqmPriceAmd",
      //             "name"=> "Գինը դրամով",
      //             "symbol"=>'amd',
      //             "value" => ""
      //           ],
      //           [
      //             "id"=> "sqmPriceRub",
      //             "name"=> "Գինը ռուբլիով",
      //             "symbol"=>'rub',
      //             "value" => ""
      //           ]
      //         ]
      //       ],
      //       [
      //         "key" => "downPayment",
      //         "title" => "Կանխավճարի չափ*",
      //         "type" => "inputNumberSymbol",
      //         "style" => "202px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> "downPaymentUsd",
      //             "name"=> "Գինը դոլարով",
      //             "symbol"=>'usd',
      //             "value" => ""
      //           ],
      //           [
      //             "id"=> "downPaymentAmd",
      //             "name"=> "Գինը դրամով",
      //             "symbol"=>'amd',
      //             "value" => ""
      //           ],
      //           [
      //             "id"=> "downPaymentRub",
      //             "name"=> "Գինը ռուբլիով",
      //             "symbol"=>'rub',
      //             "value" => ""
      //           ]
      //         ]
      //       ],
      //       [
      //         "key" => "paymentMethod",
      //         "title" => "Վճարման կարգը*",
      //         "type" => "multiselect",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //         [
      //           "label"=> "Բանկային փոխանցում",
      //           "value" => "bankTransfer"
      //         ],
      //         [
      //           "label"=> "Հիպոթեքային վարկ",
      //           "value" => "mortgageLoan"
      //         ],
      //         [
      //           "label"=> "Այլ",
      //           "value" => "other"
      //         ],
      //         ]
      //       ],
      //       [
      //       "key" => "preferredBank",
      //       "title" => "Նախընտրած բանկը*",
      //       "type" => "multiselect",
      //       "style" => "306px",
      //       "value" => '',
      //       "option" => [
      //         [
      //           "label"=> "Ամերիա բանկ",
      //           "value" => "ameriaBank"
      //         ],
      //         [
      //           "label"=> "Էվոկաբանկ",
      //           "value" => "evocaBank"
      //         ],
      //         [
      //           "label"=> "Ինեկոբանկ",
      //           "value" => "inecoBank"
      //         ],
      //         [
      //           "label"=> "ԱյԴի բանկ",
      //           "value" => "idBank"
      //         ],
      //         [
      //           "label"=> "Ակբա բանկ",
      //           "value" => "acbaBank"
      //         ],
      //         [
      //           "label"=> "Մելլաթ բանկ",
      //           "value" => "mellatBank"
      //         ],
      //         [
      //           "label"=> "ՀայԷկոնոմ բանկ",
      //           "value" => "armeconomBank"
      //         ],
      //         [
      //           "label"=> "HSBC բանկ",
      //           "value" => "HSBC"
      //         ],
      //         [
      //           "label"=> "Յունիբանկ",
      //           "value" => "uniBank"
      //         ],
      //         [
      //           "label"=> "Հայբիզնեսբանկ",
      //           "value" => "armbusinessMank"
      //         ],
      //         [
      //           "label"=> "Կոնվերս բանկ",
      //           "value" => "converseBank"
      //         ],
      //         [
      //           "label"=> "Արարատ բանկ",
      //           "value" => "araratBank"
      //         ],
      //         [
      //           "label"=> "Ֆասթ բանկ",
      //           "value" => "fastBank"
      //         ],
      //         [
      //           "label"=> "Արմսվիսբանկ",
      //           "value" => "armswissBank"
      //         ],
      //         [
      //           "label"=> "Արցախ բանկ",
      //           "value" => "artsakh"
      //         ],
      //         [
      //           "label"=> "Բիբլոս Բանկ Արմենիա",
      //           "value" => "biblos"
      //         ],
      //         [
      //           "label"=> "Արդշինբանկ",
      //           "value" => "ardshin"
      //         ],
      //         [
      //           "label"=> "ՎՏԲ-Հայաստան բանկ",
      //           "value" => "vtb"
      //         ],
      //         [
      //           "label"=> "Այլ",
      //           "value" => "other"
      //         ],
      //       ]
      //       ],
      //     ]
      //   ],
      //   [
      //     'name' => "houseDescription",
      //     'title'=> "Տան Նկարագիր",
      //     'added'=> [],
      //     "fields" => [
      //       [
      //         "key" => "surface",
      //         "title" => "Մակերես*",
      //         "type" => "inputNumberSymbol",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> "surface",
      //             "name"=> "Նշեք մակերեսը",
      //             "symbol"=>'մ.ք.',
      //             "value" => ""
      //           ],
      //         ]
      //       ],
      //       [
      //         "key" => "ceilingHeight",
      //         "title" => "Առաստաղի բարձրությունը*",
      //         "type" => "inputNumberSymbol",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> "ceilingHeight",
      //             "name"=> "Նշեք բարձրությունը ",
      //             "symbol"=>'մետր',
      //             "value" => ""
      //           ],
      //         ]
      //       ],
      //       [
      //         "key" => "numberOfRooms",
      //         "title" => "Սենյակների քանակ*",
      //         "type" => "numSelect",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> "numberOfRooms",
      //             "value" => "1"
      //           ],
      //           [
      //             "id"=> "numberOfRooms",
      //             "value" => "2"
      //           ],
      //           [
      //             "id"=> "numberOfRooms",
      //             "value" => "3"
      //           ],
      //           [
      //             "id"=> "numberOfRooms",
      //             "value" => "4"
      //           ],
      //           [
      //             "id"=> "numberOfRooms",
      //             "value" => "5"
      //           ],
      //           [
      //             "id"=> "numberOfRooms",
      //             "value" => "6"
      //           ],
      //           [
      //             "id"=> "numberOfRooms",
      //             "value" => "7+"
      //           ],
      //         ]
      //       ],
      //       [
      //         "key" => "numberOfBedrooms",
      //         "title" => "Ննջասենյակի քանակ*",
      //         "type" => "numSelect",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> "numberOfBedrooms",
      //             "value" => "1"
      //           ],
      //           [
      //             "id"=> "numberOfBedrooms",
      //             "value" => "2"
      //           ],
      //           [
      //             "id"=> "numberOfBedrooms",
      //             "value" => "3"
      //           ],
      //           [
      //             "id"=> "numberOfBedrooms",
      //             "value" => "4"
      //           ],
      //           [
      //             "id"=> "numberOfBedrooms",
      //             "value" => "5"
      //           ],
      //           [
      //             "id"=> "numberOfBedrooms",
      //             "value" => "6"
      //           ],
      //           [
      //             "id"=> "numberOfBedrooms",
      //             "value" => "7+"
      //           ],
      //         ]
      //       ],
      //       [
      //         "key" => "numberOfBathrooms",
      //         "title" => "Սահանգույցների քանակ*",
      //         "type" => "numSelect",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> "numberOfBathrooms",
      //             "value" => "1"
      //           ],
      //           [
      //             "id"=> "numberOfBathrooms",
      //             "value" => "2"
      //           ],
      //           [
      //             "id"=> "numberOfBathrooms",
      //             "value" => "3"
      //           ],
      //           [
      //             "id"=> "numberOfBathrooms",
      //             "value" => "4"
      //           ],
      //           [
      //             "id"=> "numberOfBathrooms",
      //             "value" => "5+"
      //           ],
      //         ]
      //       ],
      //       [
      //         "key" => "numberOpenBalconies",
      //         "title" => "Բաց պատշգամբների քանակ*",
      //         "type" => "numSelect",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> "numberOpenBalconies",
      //             "value" => "0"
      //           ],
      //           [
      //             "id"=> "numberOpenBalconies",
      //             "value" => "1"
      //           ],
      //           [
      //             "id"=> "numberOpenBalconies",
      //             "value" => "2"
      //           ],
      //           [
      //             "id"=> "numberOpenBalconies",
      //             "value" => "3"
      //           ],
      //           [
      //             "id"=> "numberOpenBalconies",
      //             "value" => "4"
      //           ],
      //           [
      //             "id"=> "numberOpenBalconies",
      //             "value" => "5"
      //           ],
      //           [
      //             "id"=> "numberOpenBalconies",
      //             "value" => "6"
      //           ],
      //         ]
      //       ],
      //       [
      //         "key" => "numberCloseBalconies",
      //         "title" => "Փակ պատշգամբների քանակ*",
      //         "type" => "numSelect",
      //         "style" => "629px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> "numberCloseBalconies",
      //             "value" => "0"
      //           ],
      //           [
      //             "id"=> "numberCloseBalconies",
      //             "value" => "1"
      //           ],
      //           [
      //             "id"=> "numberCloseBalconies",
      //             "value" => "2"
      //           ],
      //           [
      //             "id"=> "numberCloseBalconies",
      //             "value" => "3"
      //           ],
      //           [
      //             "id"=> "numberCloseBalconies",
      //             "value" => "4"
      //           ],
      //           [
      //             "id"=> "numberCloseBalconies",
      //             "value" => "5"
      //           ],
      //           [
      //             "id"=> "numberCloseBalconies",
      //             "value" => "6"
      //           ],
      //         ]
      //       ],
      //       [
      //         "key" => "floor",
      //         "title" => "Հարկը*",
      //         "type" => "inputNumber",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => []
      //       ],
      //       [
      //         "key" => "houseCondition",
      //         "title" => "Տան վիճակ*",
      //         "type" => "select",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> 0,
      //             "name"=> "Ընտրեք տեսակը",
      //             "value" => "",
      //             "getOptionName" => ""
      //           ],
      //           [
      //             "id"=> 1,
      //             "name"=> "Պետական վիճակ",
      //             "value" => "Պետական վիճակ",
      //             "getOptionName" => "stateCondition"
      //           ],
      //           [
      //             "id"=> 2,
      //             "name"=> "Լավ",
      //             "value" => "Լավ",
      //             "getOptionName" => "good"
      //           ],
      //           [
      //             "id"=> 3,
      //             "name"=> "Զրոյական",
      //             "value" => "Զրոյական",
      //             "getOptionName" => "zero"
      //           ],
      //           [
      //             "id"=> 4,
      //             "name"=> "Վերանորոգված",
      //             "value" => "Վերանորոգված",
      //             "getOptionName" => "renovated"
      //           ],
      //         ]
      //       ],
      //       [
      //         "key" => "parking",
      //         "title" => "Ավտոկայանատեղի*",
      //         "type" => "select",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> 0,
      //             "name"=> "Ընտրեք տեսակը",
      //             "value" => "",
      //             "getOptionName" => ""
      //           ],
      //           [
      //             "id"=> 1,
      //             "name"=> "Քարե",
      //             "value" => "Քարե",
      //             "getOptionName" => "stone"
      //           ],
      //           [
      //             "id"=> 2,
      //             "name"=> "Ստորգետնյա",
      //             "value" => "Ստորգետնյա",
      //             "getOptionName" => "underground"
      //           ],
      //           [
      //             "id"=> 3,
      //             "name"=> "Բաց ավտոկայանատեղի",
      //             "value" => "Բաց ավտոկայանատեղի",
      //             "getOptionName" => "openParking"
      //           ],
      //           [
      //             "id"=> 4,
      //             "name"=> "Ազատ տարածություն",
      //             "value" => "Ազատ տարածություն",
      //             "getOptionName" => "freeSpace"
      //           ],
      //         ]
      //       ],
      //       [
      //         "key" => "kitchenType",
      //         "title" => "Խոհանոցի տիպ*",
      //         "type" => "select",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "id"=> 0,
      //             "name"=> "Ընտրեք տեսակը",
      //             "value" => "",
      //             "getOptionName" => ""
      //           ],
      //           [
      //             "id"=> 1,
      //             "name"=> "Առանձին",
      //             "value" => "Առանձին",
      //             "getOptionName" => "separately"
      //           ],
      //           [
      //             "id"=> 2,
      //             "name"=> "Ստուդիո",
      //             "value" => "Ստուդիո",
      //             "getOptionName" => "studio"
      //           ],
      //           [
      //             "id"=> 3,
      //             "name"=> "Նախագծված չէ",
      //             "value" => "Նախագծված չէ",
      //             "getOptionName" => "notDesigned"
      //           ],
      //         ]
      //       ],
      //     ]
      //   ],
      //   [
      //     'name' => "buildingDescription",
      //     'title'=> "Շինության նկարագիր",
      //     'added'=> [],
      //     "fields" => [
      //      [
      //       "key" => "buildingType",
      //       "title" => "Շինության տիպ*",
      //       "type" => "select",
      //       "style" => "306px",
      //       "value" => '',
      //       "option" => [
      //           [
      //             "id"=> 0,
      //             "name"=> "Ընտրեք տեսակը",
      //             "value" => "",
      //             "getOptionName" => ""
      //           ],
      //           [
      //             "id"=> 1,
      //             "name"=> "Մոնոլիտ",
      //             "value" => "Մոնոլիտ",
      //             "getOptionName" => "monolith"
      //           ],
      //           [
      //             "id"=> 2,
      //             "name"=> "Քարե",
      //             "value" => "Քարե",
      //             "getOptionName" => "stone"
      //           ],
      //           [
      //             "id"=> 3,
      //             "name"=> "Պանելային",
      //             "value" => "Պանելային",
      //             "getOptionName" => "panel"
      //           ],
      //           [
      //             "id"=> 4,
      //             "name"=> "Այլ",
      //             "value" => "Այլ",
      //             "getOptionName" => "other"
      //           ],
      //       ]
      //      ],
      //      [
      //       "key" => "statement",
      //       "title" => "ՀԱՐԿԱՅՆՈՒԹՅՈՒՆ*",
      //       "placeholder" => "Ex.",
      //       "type" => "inputText",
      //       "style" => "306px",
      //       "value" => '',
      //       "option" => [],
      //      ],
      //      [
      //       "key" => "newBuilt",
      //       "type" => "checkbox",
      //       "title" => "Նորակառույց",
      //       "value" => '',
      //       "style" => "612px",
      //      ],
      //      [
      //       "key" => "buildingConstructionYear",
      //       "title" => "Կառուցման տարին*",
      //       "type" => "inputNumber",
      //       "style" => "306px",
      //       "value" => '',
      //       "option" => [],
      //      ],
      //      [
      //       "key" => "orentation",
      //       "title" => "կողմնորոշումը*",
      //       "type" => "multiselect",
      //       "style" => "306px",
      //       "value" => '',
      //       "option" => [
      //         [
      //           "label"=> "Հյուսիսային",
      //           "value" => "north"
      //         ],
      //         [
      //           "label"=> "Հարավային",
      //           "value" => "south"
      //         ],
      //         [
      //           "label"=> "Արևելյան",
      //           "value" => "east"
      //         ],
      //         [
      //           "label"=> "Արևմտյան",
      //           "value" => "west"
      //         ],
      //         [
      //           "label"=> "Հարավ-Արևելյան",
      //           "value" => "southEast"
      //         ],
      //         [
      //           "label"=> "Հարավ-Արևմտյան",
      //           "value" => "southWest"
      //         ],
      //         [
      //           "label"=> "Հյուսիս-Արևելյան",
      //           "value" => "northEast"
      //         ],
      //         [
      //           "label"=> "Հյուսիս-Արևմտյան",
      //           "value" => "northWest"
      //         ],
      //       ]
      //      ],
      //      [
      //       "key" => "propertyTax",
      //       "title" => "Տարեկան գույքահարկ*",
      //       "type" => "inputNumberSymbol",
      //       "style" => "202px",
      //       "value" => '',
      //       "option" => [
      //         [
      //           "id"=> "propertyTaxUsd",
      //           "name"=> "Գինը դոլարով",
      //           "symbol"=>'usd',
      //           "value" => ""
      //         ],
      //         [
      //           "id"=> "propertyTaxAmd",
      //           "name"=> "Գինը դրամով",
      //           "symbol"=>'amd',
      //           "value" => ""
      //         ],
      //         [
      //           "id"=> "propertyTaxRub",
      //           "name"=> "Գինը ռուբլիով",
      //           "symbol"=>'rub',
      //           "value" => ""
      //         ]
      //       ]
      //      ],
      //      [
      //       "key" => "monthlyFee",
      //       "title" => "ԱմսԱկան Սպասարկման Վճար*",
      //       "type" => "inputNumberSymbol",
      //       "style" => "202px",
      //       "value" => '',
      //       "option" => [
      //         [
      //           "id"=> "monthlyFeeUsd",
      //           "name"=> "Գինը դոլարով",
      //           "symbol"=>'usd',
      //           "value" => ""
      //         ],
      //         [
      //           "id"=> "monthlyFeeAmd",
      //           "name"=> "Գինը դրամով",
      //           "symbol"=>'amd',
      //           "value" => ""
      //         ],
      //         [
      //           "id"=> "monthlyFeeRub",
      //           "name"=> "Գինը ռուբլիով",
      //           "symbol"=>'rub',
      //           "value" => ""
      //         ]
      //       ]
      //      ],
      //     ]
      //   ],
      //   [
      //     'name' => "mainFacility",
      //     'title'=> "Կոմունալ հարմարություններ",
      //     'added'=> [],
      //     "fields" => [
      //       [
      //         "key" => "individualHeatingSystem",
      //         "title" => "Անհատական ջեռուցման համակարգ",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "371px",
      //       ],
      //       [
      //         "key" => "electricity",
      //         "title" => "Էլեկտրոէներգիա",
      //         "value" => '',
      //         "type" => "checkbox",
      //       ],
      //       [
      //         "key" => "centralizedHeatingSystem",
      //         "title" => "Կենտրոնացված ջեռուցման համակարգ",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "371px",
      //       ],
      //       [
      //         "key" => "gas",
      //         "title" => "Գազ",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "157px",
      //       ],
      //       [
      //         "key" => "airConditioner",
      //         "title" => "Օդորակիչ",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "371px",
      //       ],
      //       [
      //         "key" => "centralizedCoolingSystem",
      //         "title" => "Կենտրոնացած հովացման համակարգ",
      //         "type" => "checkbox",
      //         "value" => '',
      //       ],
      //     ],
      //   ],
      //   [
      //     'name' => "otherFacility",
      //     'title'=> "Այլ հարմարություններ",
      //     'added'=> [],
      //     "fields" => [
      //       [
      //         "key" => "furniture",
      //         "title" => "Կահույք",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "309px",
      //       ],
      //       [
      //         "key" => "storageRoom",
      //         "title" => "Խորդանոց",
      //         "type" => "checkbox",
      //         "value" => '',
      //       ],
      //       [
      //         "key" => "technics",
      //         "title" => "Տեխնիկա",
      //         "type" => "checkbox",
      //         "style" => "309px",
      //         "value" => '',
      //       ],
      //       [
      //         "key" => "wardrobe",
      //         "title" => "Զգեստապահարան",
      //         "type" => "checkbox",
      //         "value" => '',
      //       ],
      //       [
      //         "key" => "elevator",
      //         "title" => "Վերելակ",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "309px",
      //       ],
      //       [
      //         "key" => "laundryRoom",
      //         "title" => "Լվացքատուն",
      //         "type" => "checkbox",
      //         "value" => '',
      //       ],
      //       [
      //         "key" => "closedEconomyBalcony",
      //         "title" => "Փակ տնտեսական պատշգամբ",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "309px",
      //       ],
      //       [
      //         "key" => "park",
      //         "title" => "Զբոսայգի",
      //         "type" => "checkbox",
      //         "value" => '',
      //       ],
      //       [
      //         "key" => "europeWindow",
      //         "title" => "Եվրոպատուհան",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "309px",
      //       ],
      //       [
      //         "key" => "firstLine",
      //         "title" => "Առաջին գիծ",
      //         "value" => '',
      //         "type" => "checkbox",
      //       ],
      //       [
      //         "key" => "laminate",
      //         "title" => "Լամինատ",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "309px",
      //       ],
      //       [
      //         "key" => "courtyardBuilding",
      //         "title" => "Միջբակային շենք",
      //         "value" => '',
      //         "type" => "checkbox",
      //       ],
      //       [
      //         "key" => "parquetFloor",
      //         "title" => "Մանրահատակ",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "309px",
      //       ],
      //       [
      //         "key" => "nearStop",
      //         "title" => "Կանգառի մոտ",
      //         "type" => "checkbox",
      //         "value" => '',
      //       ],
      //       [
      //         "key" => "tiled",
      //         "title" => "Սալիկապատված",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "309px",
      //       ],
      //       [
      //         "key" => "sunnySide",
      //         "title" => "Արևկողմ",
      //         "type" => "checkbox",
      //         "value" => '',
      //       ],
      //       [
      //         "key" => "presgranite",
      //         "title" => "Պռեսգրանիտ",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "309px",
      //       ],
      //       [
      //         "key" => "heatedFloor",
      //         "title" => "Տաքացվող հատակ",
      //         "value" => '',
      //         "type" => "checkbox",
      //       ],
      //       [
      //         "key" => "beautifulView",
      //         "title" => "Գեղեցիկ տեսարան",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "309px",
      //       ],
            
      //       [
      //         "key" => "gate",
      //         "title" => "Դարպաս",
      //         "type" => "checkbox",
      //         "value" => '',
      //       ],
      //       [
      //         "key" => "securitySystem",
      //         "title" => "Անվտանգության համակարգ",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "309px",
      //       ],
      //       [
      //         "key" => "fenced",
      //         "title" => "Պարսպապատ",
      //         "type" => "checkbox",
      //         "value" => '',
      //       ],
      //       [
      //         "key" => "playground",
      //         "title" => "Խաղահրապարակ",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "309px",
      //       ],
      //       [
      //         "key" => "twoWayEntry",
      //         "title" => "Երկկողմանի մուտք",
      //         "type" => "checkbox",
      //         "value" => '',
      //       ],
      //       [
      //         "key" => "bilateralPosition",
      //         "title" => "Երկկողմանի դիրք",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "309px",
      //       ],
      //       [
      //         "key" => "ironDoor",
      //         "title" => "Երկաթյա դուռ",
      //         "value" => '',
      //         "type" => "checkbox",
      //       ],
      //       [
      //         "key" => "sauna",
      //         "title" => "Շոգեբաղնիք",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "309px",
      //       ],
      //       [
      //         "key" => "loggia",
      //         "title" => "Լոջա",
      //         "type" => "checkbox",
      //         "value" => '',
      //       ],
      //       [
      //         "key" => "pool",
      //         "title" => "Լողավազան",
      //         "type" => "checkbox",
      //         "value" => '',
      //         "style" => "309px",
      //       ],
      //       [
      //         "key" => "bottom",
      //         "title" => "Հատակ*",
      //         "type" => "multiselect",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "label"=> "Լամինատ",
      //             "value" => "laminate"
      //           ],
      //           [
      //             "label"=> "Մանրահատակ",
      //             "value" => "parquetFloor"
      //           ],
      //           [
      //             "label"=> "Սալիկ",
      //             "value" => "tile"
      //           ],
      //           [
      //             "label"=> "Բետոն",
      //             "value" => "concrete"
      //           ],
      //           [
      //             "label"=> "Այլ",
      //             "value" => "other"
      //           ],
      //         ],
      //       ],
      //       [
      //         "key" => "roof",
      //         "title" => "Առաստաղ*",
      //         "type" => "multiselect",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "label"=> "Կախովի",
      //             "value" => "suspended"
      //           ],
      //           [
      //             "label"=> "Ձգվող",
      //             "value" => "tensile"
      //           ],
      //           [
      //             "label"=> "Բետոն",
      //             "value" => "concrete"
      //           ],
      //         ],
      //       ],
      //       [
      //         "key" => "cover",
      //         "title" => "Ծածկեր*",
      //         "type" => "multiselect",
      //         "style" => "306px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "label"=> "Բետոն",
      //             "value" => "concrete"
      //           ],
      //           [
      //             "label"=> "Բաղդադ",
      //             "value" => "baghdad"
      //           ],
      //           [
      //             "label"=> "Պանել",
      //             "value" => "panel"
      //           ],
      //         ],
      //       ],
      //     ],
      //   ],
      //   [
      //     'name' => "media",
      //     'title'=> "Մեդիա",
      //     'added'=> [],
      //     "fields" => [
      //       [
      //         "key" => "uploadedImgs",
      //         "title" => "",
      //         "type" => "imgsUpload",
      //         "style" => "639px",
      //         "value" => '',
      //         "option" => [],
      //       ],
      //       [
      //         "key" => "video",
      //         "title" => "Վիդեոյի հղում*",
      //         "placeholder" => "Տեղադրեք հղումը",
      //         "type" => "inputText",
      //         "style" => "639px",
      //         "value" => '',
      //         "option" => [],
      //       ]
      //     ],
      //   ],
      //   [
      //     'name' => "keywords",
      //     'title'=> "Բանալի Բառեր",
      //     'added'=> [],
      //     "fields" => [
      //       [
      //         "key" => "chooseWords",
      //         "title" => "Ընտրել բառեր*",
      //         "type" => "keyword",
      //         "style" => "631px",
      //         "value" => '',
      //         "option" => [],
      //       ],
      //     ],
      //   ],
      //   [
      //     'name' => "juridical",
      //     'title'=> "Իրավաբանական",
      //     'added'=> [],
      //     "fields" => [
      //       [
      //         "key" => "owner",
      //         "title" => "Սեփականատեր 1*",
      //         "placeholder" => "Գրեք սեփականատիրոջ անունը",
      //         "type" => "inputText",
      //         "style" => "412px",
      //         "value" => '',
      //         "option" => [],
      //       ],
      //       [
      //         "key" => "ownerTel",
      //         "title" => "Սեփականատիրոջ Հեռախոսահամար*",
      //         "type" => "inputNumber",
      //         "style" => "412px",
      //         "value" => '',
      //         "option" => [],
      //       ],
      //       [
      //         "key" => "addOwner",
      //         "title" => "Ավելացնել սեփականատեր",
      //         "type" => "addField",
      //         "style" => "217px",
      //         "value" => '',
      //         "option" => [
      //           [
      //             "key" => "owner2",
      //             "title" => "Սեփականատեր 2*",
      //             "placeholder" => "Գրեք սեփականատիրոջ անունը",
      //             "type" => "inputText",
      //             "style" => "412px",
      //           ],
      //           [
      //             "key" => "ownerTel2",
      //             "title" => "Սեփականատիրոջ Հեռախոսահամար*",
      //             "type" => "inputNumber",
      //             "style" => "412px",
      //             "option" => [],
      //           ],
      //           [
      //             "key" => "owner3",
      //             "title" => "Սեփականատեր 3*",
      //             "placeholder" => "Գրեք սեփականատիրոջ անունը",
      //             "type" => "inputText",
      //             "style" => "412px",
      //           ],
      //           [
      //             "key" => "ownerTel3",
      //             "title" => "Սեփականատիրոջ Հեռախոսահամար*",
      //             "type" => "inputNumber",
      //             "style" => "412px",
      //             "option" => [],
      //           ],
      //         ],
      //       ],
      //     ],
      //   ],
      //   [
      //     'name' => "additionalInfo",
      //     'title'=> "Լրացուցիչ Ինֆորմացիա",
      //     'added'=> [],
      //     "fields" => [
      //       [
      //         "key" => "likelyInfo",
      //         "title" => "Գրեք նախընտրած ինֆորմացիան*",
      //         "type" => "inputText",
      //         "style" => "412px",
      //         "height" => "80px",
      //         "value" => '',
      //         "option" => [],
      //       ],
      //       [
      //         "key" => "uploadFiles",
      //         "title" => "Կցել Փաստաթուղթ",
      //         "type" => "uploadFile",
      //         "style" => "217px",
      //         "value" => '',
      //         "option" => [],
      //       ],
      //     ],
      //   ],
      //   [
      //     'name' => "specialists",
      //     'title'=> "Կից Մասնագետներ",
      //     'added'=> [],
      //     "fields" => [
      //       [
      //         "key" => "agent",
      //         "title" => "Գործակալ*",
      //         "type" => "select",
      //         "style" => "412px",
      //         "value" => '',
      //         "option" => [],
      //       ],
      //       [
      //         "key" => "meneger",
      //         "title" => "Մենեջեր*",
      //         "type" => "select",
      //         "style" => "412px",
      //         "value" => '',
      //         "option" => [],
      //       ],
      //     ],
      //   ],
      // ];
     
     return response()->json($str);
  }
}