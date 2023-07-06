<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalForm;

class GarbageController extends Controller
{
    public function addNow() {


        $form = GlobalForm::findorFail(1);
        $form->am = json_encode([
          [
            'name' => "announcement",
            'title'=> "Հայտարարություն",
            'added'=> [],
            "fields" => [
              [
                "key" => "transactionType",
                "title" => "ԳՈՐԾԱՐՔԻ ՏԵՍԱԿ*",
                "type" => "select",
                "style" => "306px",
                "required" => true,
                "value" => '',
                "selectedOptionName" => '',
                "option" => [
                  [
                    "id"=> 1,
                    "name"=> "Ընտրեք տեսակը",
                    "value" => "",
                    "getOptionName" => ""
                  ],
                  [
                    "id"=> 2,
                    "name"=> "Վաճառք",
                    "value" => "Վաճառք",
                    "getOptionName" => "sale"
                  ],
                  [
                    "id"=> 3,
                    "name"=> "Վարձակալություն",
                    "value" => "Վարձակալություն",
                    "getOptionName" => "rent"
                  ]
                ]
              ],
              [
                "key" => "propertyType",
                "title" => "ԳՈՒՅՔԻ ՏԵՍԱԿ*",
                "type" => "select",
                "style" => "306px",
                "required" => true,
                "value" => '',
                "option" => [
                  [
                    "id"=> 1,
                    "name"=> "Ընտրեք տեսակը",
                    "value" => "",
                    "getOptionName" => ""
                  ],
                  [
                    "id"=> 2,
                    "name"=> "Բնակարան",
                    "value" => "Բնակարան",
                    "getOptionName" => "house"
                  ],
                  [
                    "id"=> 3,
                    "name"=> "Առանձնատուն",
                    "value" => "Առանձնատուն",
                    "getOptionName" => "privateHouse"
                  ],
                  [
                    "id"=> 4,
                    "name"=> "Կոմերցիոն (առանձնատուն)",
                    "value" => "Կոմերցիոն (առանձնատուն)",
                    "getOptionName" => "commercialHouse"
                  ],
                  [
                    "id"=> 5,
                    "name"=> "Կոմերցիոն (բնակարան)",
                    "value" => "Կոմերցիոն (բնակարան)",
                    "getOptionName" => "commercialApartment"
                  ],
                ]
              ],
              [
                "key" => "announcementTitle",
                "title" => "ՀԱՅՏԱՐԱՐՈՒԹՅԱՆ ՎԵՐՆԱԳԻՐ*",
                "type" => "text",
                "style" => "629px",
                "required" => true,
                "value" => '',
                "allAnswers" => [],
                "option" => []
              ],
              [
                "key" => "announcementDesc",
                "title" => "ՀԱՅՏԱՐԱՐՈՒԹՅԱՆ ՆԿԱՐԱԳՐՈՒԹՅՈՒՆ*",
                "type" => "text",
                "style" => "629px",
                "required" => true,
                "value" => '',
                "allAnswers" => [],
                "option" => []
              ],
              [
                "key" => "announcementType",
                "title" => "ՀԱՅՏԱՐԱՐՈՒԹՅԱՆ ՏԵՍԱԿ*",
                "type" => "select",
                "style" => "306px",
                "required" => true,
                "value" => '',
                "option" => [
                  [
                    "id"=> 1,
                    "name"=> "Ընտրեք տեսակը",
                    "value" => "",
                    "getOptionName" => ""
                  ],
                  [
                    "id"=> 2,
                    "name"=> "Հասարակ",
                    "value" => "Հասարակ",
                    "getOptionName" => "simple"
                  ],
                  [
                    "id"=> 3,
                    "name"=> "Տոպ",
                    "value" => "Տոպ",
                    "getOptionName" => "top"
                  ],
                  [
                    "id"=> 4,
                    "name"=> "Շտապ",
                    "value" => "Շտապ",
                    "getOptionName" => "urgent"
                  ],
                ]
              ],
            ]
          ],
          [
            'name' => "location",
            'title'=> "Գտնվելու Վայրը - Երևան",
            'added'=> [],
            "fields" => [
              [
                "key" => "community",
                "title" => "Համայնք*",
                "type" => "communitySelect",
                "style" => "306px",
                "communityId" => '',
                "required" => true,
                "value" => '',
                "communityStreet" => [
                  "key" => "street",
                  "title" => "Փողոց*",
                  "type" => "selectStreet",
                  "style" => "283px",
                  "streetId" => '',
                  "required" => true,
                  "value" => '',
                  "option" => []
                ],
                "option" => [
                  [
                    "id"=> 1,
                    "name"=> "Ընտրեք",
                    "value" => "",
                    "getOptionName" => ""
                  ],
                  [
                    "id"=> 2,
                    "name"=> "Աջափնյակ",
                    "value" => "Աջափնյակ",
                    "getOptionName" => "ajapnyak"
                  ],
                  [
                    "id"=> 3,
                    "name"=> "Արաբկիր",
                    "value" => "Արաբկիր",
                    "getOptionName" => "arabkir"
                  ],
                  [
                    "id"=> 4,
                    "name"=> "Ավան",
                    "value" => "Ավան",
                    "getOptionName" => "avan"
                  ],
                  [
                    "id"=> 5,
                    "name"=> "Դավթաշեն",
                    "value" => "Դավթաշեն",
                    "getOptionName" => "davtashen"
                  ],
                  [
                    "id"=> 6,
                    "name"=> "Էրեբունի",
                    "value" => "Էրեբունի",
                    "getOptionName" => "erebuni"
                  ],
                  [
                    "id"=> 7,
                    "name"=> "Քանաքեռ-Զեյթուն",
                    "value" => "Քանաքեռ-Զեյթուն",
                    "getOptionName" => "zeytun"
                  ],
                  [
                    "id"=> 8,
                    "name"=> "Կենտրոն",
                    "value" => "Կենտրոն",
                    "getOptionName" => "kentron"
                  ],
                  [
                    "id"=> 9,
                    "name"=> "Մալաթիա-Սեբաստիա",
                    "value" => "Մալաթիա-Սեբաստիա",
                    "getOptionName" => "malatia"
                  ],
                  [
                    "id"=> 10,
                    "name"=> "Նորք-Մարաշ",
                    "value" => "Նորք-Մարաշ",
                    "getOptionName" => "norqMarash"
                  ],
                  [
                    "id"=> 11,
                    "name"=> "Նոր Նորք",
                    "value" => "Նոր Նորք",
                    "getOptionName" => "norNorq"
                  ],
                  [
                    "id"=> 12,
                    "name"=> "Նուբարաշեն",
                    "value" => "Նուբարաշեն",
                    "getOptionName" => "nubarashen"
                  ],
                  [
                    "id"=> 13,
                    "name"=> "Շենգավիթ",
                    "value" => "Շենգավիթ",
                    "getOptionName" => "shengavit"
                  ],
                  [
                    "id"=> 14,
                    "name"=> "Վահագնի թաղամաս",
                    "value" => "Վահագնի թաղամաս",
                    "getOptionName" => "vahagni"
                  ],
                  [
                    "id"=> 15,
                    "name"=> "Այլ",
                    "value" => "Այլ",
                    "getOptionName" => "other"
                  ]
                  ],
                
              ],
              [
                "key" => "building",
                "title" => "Շենք",
                "type" => "inputNumber",
                "style" => "100px",
                "required" => false,
                "value" => '',
                "option" => []
              ],
              [
                "key" => "entrance",
                "title" => "Մուտք",
                "type" => "inputNumber",
                "style" => "100px",
                "required" => false,
                "value" => '',
                "option" => []
              ],
              [
                "key" => "apartment",
                "title" => "Բնակարան",
                "type" => "inputNumber",
                "style" => "100px",
                "required" => false,
                "value" => '',
                "option" => []
              ],
              [
                "key" => "map",
                "title" => "MAP PIN*",
                "type" => "map",
                "style" => "631px",
                "value" => [],
                "option" => []
              ],
              [
                "key" => "realAddress",
                "title" => "Իրական հասցե",
                "type" => "inputText",
                "style" => "629px",
                "required" => false,
                "placeholder" => "Հասցե",
                "value" => '',
                "option" => []
              ],
            ]
          ],
          [
            'name' => "price",
            'title'=> "Գինը",
            'added'=> [],
            "fields" => [
              [
                "key" => "totalPrice",
                "title" => "Ընդհանուր գինը*",
                "type" => "inputNumberSingle",
                "style" => "198px",
                "placeholder" => "Գինը դոլարով",
                "required" => true,
                "value" => '',
              ],
              [
                "key" => "sqmPrice",
                "title" => "Գինը 1 քմ",
                "required" => false,
                "type" => "inputNumberSingle",
                "style" => "198px",
                "placeholder" => "Գինը դոլարով",
                "value" => '',
              ],
              [
                "key" => "downPayment",
                "title" => "Նախավճարի չափ",
                "type" => "inputNumberSingle",
                "style" => "198px",
                "placeholder" => "Գինը դոլարով",
                "required" => false,
                "value" => '',
              ],
              [
                "key" => "priceNegotiable",
                "title" => "Գինը պայմանագրային*",
                "type" => "checkbox",
                "style" => "629px",
                "value" => 'on',
                "option" => [
                  "status" => false
                ]
              ],
              [
                "key" => "paymentMethod",
                "title" => "Վճարման կարգը*",
                "type" => "multiselect",
                "style" => "306px",
                "required" => true,
                "value" => '',
                "option" => [
                [
                  "label"=> "Բանկային փոխանցում",
                  "value" => "bankTransfer"
                ],
                [
                  "label"=> "Հիպոթեքային վարկ",
                  "value" => "mortgageLoan"
                ],
                [
                  "label"=> "Այլ",
                  "value" => "other"
                ],
                ]
              ],
            [
              "key" => "preferredBank",
              "title" => "Նախընտրած բանկը",
              "type" => "multiselect",
              "style" => "306px",
              "required" => false,
              "value" => '',
              "option" => [
                [
                  "label"=> "Ամերիա բանկ",
                  "value" => "ameriaBank"
                ],
                [
                  "label"=> "Էվոկաբանկ",
                  "value" => "evocaBank"
                ],
                [
                  "label"=> "Ինեկոբանկ",
                  "value" => "inecoBank"
                ],
                [
                  "label"=> "ԱյԴի բանկ",
                  "value" => "idBank"
                ],
                [
                  "label"=> "Ակբա բանկ",
                  "value" => "acbaBank"
                ],
                [
                  "label"=> "Մելլաթ բանկ",
                  "value" => "mellatBank"
                ],
                [
                  "label"=> "ՀայԷկոնոմ բանկ",
                  "value" => "armeconomBank"
                ],
                [
                  "label"=> "HSBC բանկ",
                  "value" => "HSBC"
                ],
                [
                  "label"=> "Յունիբանկ",
                  "value" => "uniBank"
                ],
                [
                  "label"=> "Հայբիզնեսբանկ",
                  "value" => "armbusinessMank"
                ],
                [
                  "label"=> "Կոնվերս բանկ",
                  "value" => "converseBank"
                ],
                [
                  "label"=> "Արարատ բանկ",
                  "value" => "araratBank"
                ],
                [
                  "label"=> "Ֆասթ բանկ",
                  "value" => "fastBank"
                ],
                [
                  "label"=> "Արմսվիսբանկ",
                  "value" => "armswissBank"
                ],
                [
                  "label"=> "Արցախ բանկ",
                  "value" => "artsakh"
                ],
                [
                  "label"=> "Բիբլոս Բանկ Արմենիա",
                  "value" => "biblos"
                ],
                [
                  "label"=> "Արդշինբանկ",
                  "value" => "ardshin"
                ],
                [
                  "label"=> "ՎՏԲ-Հայաստան բանկ",
                  "value" => "vtb"
                ],
                [
                  "label"=> "Այլ",
                  "value" => "other"
                ],
              ]
            ],
            ]
          ],
          [
            'name' => "houseDescription",
            'title'=> "Տան Նկարագիր",
            'added'=> [],
            "fields" => [
              [
                "key" => "surface",
                "title" => "Մակերես*",
                "type" => "inputNumberSymbol",
                "style" => "306px",
                "required" => true,
                "value" => '',
                "option" => [
                  [
                    "id"=> "surface",
                    "name"=> "Նշեք մակերեսը",
                    "symbol"=>'մ.ք.',
                    "value" => ""
                  ],
                ]
              ],
              [
                "key" => "ceilingHeight",
                "title" => "Առաստաղի բարձրությունը*",
                "type" => "inputNumberSymbol",
                "style" => "306px",
                "required" => true,
                "value" => '',
                "option" => [
                  [
                    "id"=> "ceilingHeight",
                    "name"=> "Նշեք բարձրությունը ",
                    "symbol"=>'մետր',
                    "value" => ""
                  ],
                ]
              ],
              [
                "key" => "numberOfRooms",
                "title" => "Սենյակների քանակ*",
                "type" => "numSelect",
                "style" => "306px",
                "required" => true,
                "value" => '',
                "option" => [
                  [
                    "id"=> "numberOfRooms",
                    "value" => "1"
                  ],
                  [
                    "id"=> "numberOfRooms",
                    "value" => "2"
                  ],
                  [
                    "id"=> "numberOfRooms",
                    "value" => "3"
                  ],
                  [
                    "id"=> "numberOfRooms",
                    "value" => "4"
                  ],
                  [
                    "id"=> "numberOfRooms",
                    "value" => "5"
                  ],
                  [
                    "id"=> "numberOfRooms",
                    "value" => "6"
                  ],
                  [
                    "id"=> "numberOfRooms",
                    "value" => "7+"
                  ],
                ]
              ],
              [
                "key" => "numberOfBedrooms",
                "title" => "Ննջասենյակի քանակ*",
                "type" => "numSelect",
                "style" => "306px",
                "required" => true,
                "value" => '',
                "option" => [
                  [
                    "id"=> "numberOfBedrooms",
                    "value" => "1"
                  ],
                  [
                    "id"=> "numberOfBedrooms",
                    "value" => "2"
                  ],
                  [
                    "id"=> "numberOfBedrooms",
                    "value" => "3"
                  ],
                  [
                    "id"=> "numberOfBedrooms",
                    "value" => "4"
                  ],
                  [
                    "id"=> "numberOfBedrooms",
                    "value" => "5"
                  ],
                  [
                    "id"=> "numberOfBedrooms",
                    "value" => "6"
                  ],
                  [
                    "id"=> "numberOfBedrooms",
                    "value" => "Studio"
                  ],
                ]
              ],
              [
                "key" => "numberOfBathrooms",
                "title" => "Սանհանգույցների քանակ*",
                "type" => "numSelect",
                "style" => "306px",
                "required" => true,
                "value" => '',
                "option" => [
                  [
                    "id"=> "numberOfBathrooms",
                    "value" => "1"
                  ],
                  [
                    "id"=> "numberOfBathrooms",
                    "value" => "2"
                  ],
                  [
                    "id"=> "numberOfBathrooms",
                    "value" => "3"
                  ],
                  [
                    "id"=> "numberOfBathrooms",
                    "value" => "4"
                  ],
                  [
                    "id"=> "numberOfBathrooms",
                    "value" => "5+"
                  ],
                ]
              ],
              [
                "key" => "numberOpenBalconies",
                "title" => "Բաց պատշգամբների քանակ",
                "type" => "numSelect",
                "style" => "306px",
                "required" => false,
                "value" => '',
                "option" => [
                  [
                    "id"=> "numberOpenBalconies",
                    "value" => "0"
                  ],
                  [
                    "id"=> "numberOpenBalconies",
                    "value" => "1"
                  ],
                  [
                    "id"=> "numberOpenBalconies",
                    "value" => "2"
                  ],
                  [
                    "id"=> "numberOpenBalconies",
                    "value" => "3"
                  ],
                  [
                    "id"=> "numberOpenBalconies",
                    "value" => "4"
                  ],
                  [
                    "id"=> "numberOpenBalconies",
                    "value" => "5"
                  ],
                  [
                    "id"=> "numberOpenBalconies",
                    "value" => "6"
                  ],
                ]
              ],
              [
                "key" => "numberCloseBalconies",
                "title" => "Փակ պատշգամբների քանակ",
                "type" => "numSelect",
                // "style" => "629px",
                "style" => "306px",
                "required" => false,
                "value" => '',
                "option" => [
                  [
                    "id"=> "numberCloseBalconies",
                    "value" => "0"
                  ],
                  [
                    "id"=> "numberCloseBalconies",
                    "value" => "1"
                  ],
                  [
                    "id"=> "numberCloseBalconies",
                    "value" => "2"
                  ],
                  [
                    "id"=> "numberCloseBalconies",
                    "value" => "3"
                  ],
                  [
                    "id"=> "numberCloseBalconies",
                    "value" => "4"
                  ],
                  [
                    "id"=> "numberCloseBalconies",
                    "value" => "5"
                  ],
                  [
                    "id"=> "numberCloseBalconies",
                    "value" => "6"
                  ],
                ]
              ],
              [
                "key" => "groundSurface",
                "title" => "Հողի Մակերես",
                "type" => "inputNumberSymbol",
                "style" => "306px",
                "required" => false,
                "value" => '',
                "option" => [
                  [
                    "id"=> "groundSurface", 
                    "name"=> "Նշեք հողի մակերեսը",
                    "symbol"=>'մ.ք.',
                    "value" => ""
                  ],
                ]
              ],
              [
                "key" => "floor",
                "title" => "Հարկը*",
                "type" => "inputNumber",
                "style" => "306px",
                "required" => true,
                "value" => '',
                "option" => []
              ],
              [
                "key" => "houseCondition",
                "title" => "Տան վիճակ*",
                "type" => "select",
                "style" => "306px",
                "required" => true,
                "value" => '',
                "option" => [
                  [
                    "id"=> 0,
                    "name"=> "Ընտրեք տեսակը",
                    "value" => "",
                    "getOptionName" => ""
                  ],
                  [
                    "id"=> 1,
                    "name"=> "Պետական վիճակ",
                    "value" => "Պետական վիճակ",
                    "getOptionName" => "stateCondition"
                  ],
                  [
                    "id"=> 2,
                    "name"=> "Լավ",
                    "value" => "Լավ",
                    "getOptionName" => "good"
                  ],
                  [
                    "id"=> 3,
                    "name"=> "Զրոյական",
                    "value" => "Զրոյական",
                    "getOptionName" => "zero"
                  ],
                  [
                    "id"=> 4,
                    "name"=> "Վերանորոգված",
                    "value" => "Վերանորոգված",
                    "getOptionName" => "renovated"
                  ],
                ]
              ],
              [
                "key" => "parking",
                "title" => "Ավտոկայանատեղի",
                "type" => "select",
                "style" => "306px",
                "required" => false,
                "value" => '',
                "option" => [
                  [
                    "id"=> 0,
                    "name"=> "Ընտրեք տեսակը",
                    "value" => "",
                    "getOptionName" => ""
                  ],
                  [
                    "id"=> 1,
                    "name"=> "Քարե",
                    "value" => "Քարե",
                    "getOptionName" => "stone"
                  ],
                  [
                    "id"=> 2,
                    "name"=> "Ստորգետնյա",
                    "value" => "Ստորգետնյա",
                    "getOptionName" => "underground"
                  ],
                  [
                    "id"=> 3,
                    "name"=> "Բաց ավտոկայանատեղի",
                    "value" => "Բաց ավտոկայանատեղի",
                    "getOptionName" => "openParking"
                  ],
                  [
                    "id"=> 4,
                    "name"=> "Ազատ տարածություն",
                    "value" => "Ազատ տարածություն",
                    "getOptionName" => "freeSpace"
                  ],
                ]
              ],
              [
                "key" => "kitchenType",
                "title" => "Խոհանոցի տիպ*",
                "type" => "select",
                "style" => "306px",
                "required" => true,
                "value" => '',
                "option" => [
                  [
                    "id"=> 0,
                    "name"=> "Ընտրեք տեսակը",
                    "value" => "",
                    "getOptionName" => ""
                  ],
                  [
                    "id"=> 1,
                    "name"=> "Առանձին",
                    "value" => "Առանձին",
                    "getOptionName" => "separately"
                  ],
                  [
                    "id"=> 2,
                    "name"=> "Ստուդիո",
                    "value" => "Ստուդիո",
                    "getOptionName" => "studio"
                  ],
                  [
                    "id"=> 3,
                    "name"=> "Նախագծված չէ",
                    "value" => "Նախագծված չէ",
                    "getOptionName" => "notDesigned"
                  ],
                ]
              ],
            ]
          ],
          [
            'name' => "buildingDescription",
            'title'=> "Շինության նկարագիր",
            'added'=> [],
            "fields" => [
            [
              "key" => "buildingType",
              "title" => "Շինության տիպ*",
              "type" => "select",
              "style" => "306px",
              "required" => true,
              "value" => '',
              "option" => [
                  [
                    "id"=> 0,
                    "name"=> "Ընտրեք տեսակը",
                    "value" => "",
                    "getOptionName" => ""
                  ],
                  [
                    "id"=> 1,
                    "name"=> "Մոնոլիտ",
                    "value" => "Մոնոլիտ",
                    "getOptionName" => "monolith"
                  ],
                  [
                    "id"=> 2,
                    "name"=> "Քարե",
                    "value" => "Քարե",
                    "getOptionName" => "stone"
                  ],
                  [
                    "id"=> 3,
                    "name"=> "Պանելային",
                    "value" => "Պանելային",
                    "getOptionName" => "panel"
                  ],
                  [
                    "id"=> 4,
                    "name"=> "Այլ",
                    "value" => "Այլ",
                    "getOptionName" => "other"
                  ],
              ]
            ],
            [
              "key" => "statement",
              "title" => "ՀԱՐԿԱՅՆՈՒԹՅՈՒՆ*",
              "placeholder" => "Ex.",
              "type" => "inputText",
              "style" => "306px",
              "required" => true,
              "value" => '',
              "option" => [],
            ],
            [
              "key" => "newBuilt",
              "type" => "checkbox",
              "title" => "Նորակառույց",
              "value" => 'on',
              "style" => "612px",
              "required" => false,
            ],
            [
              "key" => "buildingConstructionYear",
              "title" => "Կառուցման տարին",
              "type" => "inputNumber",
              "style" => "306px",
              "required" => false,
              "value" => '',
              "option" => [],
            ],
            [
              "key" => "orentation",
              "title" => "Կողմնորոշումը",
              "type" => "multiselect",
              "style" => "306px",
              "required" => false,
              "value" => '',
              "option" => [
                [
                  "label"=> "Հյուսիսային",
                  "value" => "north"
                ],
                [
                  "label"=> "Հարավային",
                  "value" => "south"
                ],
                [
                  "label"=> "Արևելյան",
                  "value" => "east"
                ],
                [
                  "label"=> "Արևմտյան",
                  "value" => "west"
                ],
                [
                  "label"=> "Հարավ-Արևելյան",
                  "value" => "southEast"
                ],
                [
                  "label"=> "Հարավ-Արևմտյան",
                  "value" => "southWest"
                ],
                [
                  "label"=> "Հյուսիս-Արևելյան",
                  "value" => "northEast"
                ],
                [
                  "label"=> "Հյուսիս-Արևմտյան",
                  "value" => "northWest"
                ],
              ]
            ],
            [
              "key" => "propertyTax",
              "title" => "Տարեկան գույքահարկ",
              "type" => "inputNumberSingle",
              "style" => "306px",
              "placeholder" => "Գինը դոլարով",
              "required" => false,
              "value" => '',
            ],
            [
              "key" => "monthlyFee",
              "title" => "Ամսական Սպասարկման Վճար",
              "type" => "inputNumberSingle",
              "style" => "306px",
              "placeholder" => "Գինը դոլարով",
              "required" => false,
              "value" => '',
            ],
            ]
          ],
          [
            'name' => "mainFacility",
            'title'=> "Կոմունալ հարմարություններ",
            'added'=> [],
            "fields" => [
              [
                "key" => "individualHeatingSystem",
                "title" => "Անհատական ջեռուցման համակարգ",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "371px",
              ],
              [
                "key" => "electricity",
                "title" => "Էլեկտրոէներգիա",
                "value" => 'on',
                "type" => "checkbox",
              ],
              [
                "key" => "centralizedHeatingSystem",
                "title" => "Կենտրոնացված ջեռուցման համակարգ",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "371px",
              ],
              [
                "key" => "gas",
                "title" => "Գազ",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "157px",
              ],
              [
                "key" => "airConditioner",
                "title" => "Օդորակիչ",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "371px",
              ],
              [
                "key" => "centralizedCoolingSystem",
                "title" => "Կենտրոնացած հովացման համակարգ",
                "type" => "checkbox",
                "value" => 'on',
              ],
            ],
          ],
          [
            'name' => "otherFacility",
            'title'=> "Այլ հարմարություններ",
            'added'=> [],
            "fields" => [
              [
                "key" => "furniture",
                "title" => "Կահույք",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
              ],
              [
                "key" => "storageRoom",
                "title" => "Խորդանոց",
                "type" => "checkbox",
                "value" => 'on',
              ],
              [
                "key" => "technics",
                "title" => "Տեխնիկա",
                "type" => "checkbox",
                "style" => "309px",
                "value" => 'on',
              ],
              [
                "key" => "wardrobe",
                "title" => "Զգեստապահարան",
                "type" => "checkbox",
                "value" => 'on',
              ],
              [
                "key" => "elevator",
                "title" => "Վերելակ",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
              ],
              [
                "key" => "laundryRoom",
                "title" => "Լվացքատուն",
                "type" => "checkbox",
                "value" => 'on',
              ],
              [
                "key" => "closedEconomyBalcony",
                "title" => "Փակ տնտեսական պատշգամբ",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
              ],
              [
                "key" => "park",
                "title" => "Զբոսայգի",
                "type" => "checkbox",
                "value" => 'on',
              ],
              [
                "key" => "europeWindow",
                "title" => "Եվրոպատուհան",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
              ],
              [
                "key" => "firstLine",
                "title" => "Առաջին գիծ",
                "value" => 'on',
                "type" => "checkbox",
              ],
              [
                "key" => "laminate",
                "title" => "Լամինատ",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
              ],
              [
                "key" => "courtyardBuilding",
                "title" => "Միջբակային շենք",
                "value" => 'on',
                "type" => "checkbox",
              ],
              [
                "key" => "parquetFloor",
                "title" => "Մանրահատակ",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
              ],
              [
                "key" => "nearStop",
                "title" => "Կանգառի մոտ",
                "type" => "checkbox",
                "value" => 'on',
              ],
              [
                "key" => "tiled",
                "title" => "Սալիկապատված",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
              ],
              [
                "key" => "sunnySide",
                "title" => "Արևկողմ",
                "type" => "checkbox",
                "value" => 'on',
              ],
              [
                "key" => "presgranite",
                "title" => "Պռեսգրանիտ",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
              ],
              [
                "key" => "heatedFloor",
                "title" => "Տաքացվող հատակ",
                "value" => 'on',
                "type" => "checkbox",
              ],
              [
                "key" => "beautifulView",
                "title" => "Գեղեցիկ տեսարան",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
              ],
              
              [
                "key" => "gate",
                "title" => "Դարպաս",
                "type" => "checkbox",
                "value" => 'on',
              ],
              [
                "key" => "securitySystem",
                "title" => "Անվտանգության համակարգ",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
              ],
              [
                "key" => "fenced",
                "title" => "Պարսպապատ",
                "type" => "checkbox",
                "value" => 'on',
              ],
              [
                "key" => "playground",
                "title" => "Խաղահրապարակ",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
              ],
              [
                "key" => "twoWayEntry",
                "title" => "Երկկողմանի մուտք",
                "type" => "checkbox",
                "value" => 'on',
              ],
              [
                "key" => "bilateralPosition",
                "title" => "Երկկողմանի դիրք",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
              ],
              [
                "key" => "ironDoor",
                "title" => "Երկաթյա դուռ",
                "value" => 'on',
                "type" => "checkbox",
              ],
              [
                "key" => "sauna",
                "title" => "Շոգեբաղնիք",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
              ],
              [
                "key" => "loggia",
                "title" => "Լոջա",
                "type" => "checkbox",
                "value" => 'on',
              ],
              [
                "key" => "pool",
                "title" => "Լողավազան",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
              ],
              [
                "key" => "bottom",
                "title" => "Հատակ",
                "type" => "multiselect",
                "style" => "306px",
                "required" => false,
                "value" => '',
                "option" => [
                  [
                    "label"=> "Լամինատ",
                    "value" => "laminate"
                  ],
                  [
                    "label"=> "Մանրահատակ",
                    "value" => "parquetFloor"
                  ],
                  [
                    "label"=> "Սալիկ",
                    "value" => "tile"
                  ],
                  [
                    "label"=> "Բետոն",
                    "value" => "concrete"
                  ],
                  [
                    "label"=> "Այլ",
                    "value" => "other"
                  ],
                ],
              ],
              [
                "key" => "roof",
                "title" => "Առաստաղ",
                "type" => "multiselect",
                "style" => "306px",
                "required" => false,
                "value" => '',
                "option" => [
                  [
                    "label"=> "Կախովի",
                    "value" => "suspended"
                  ],
                  [
                    "label"=> "Ձգվող",
                    "value" => "tensile"
                  ],
                  [
                    "label"=> "Բետոն",
                    "value" => "concrete"
                  ],
                ],
              ],
              [
                "key" => "cover",
                "title" => "Ծածկեր",
                "type" => "multiselect",
                "style" => "306px",
                "required" => false,
                "value" => '',
                "option" => [
                  [
                    "label"=> "Բետոն",
                    "value" => "concrete"
                  ],
                  [
                    "label"=> "Բաղդադ",
                    "value" => "baghdad"
                  ],
                  [
                    "label"=> "Պանել",
                    "value" => "panelCover"
                  ],
                ],
              ],
            ],
          ],
          [
            'name' => "media",
            'title'=> "Մեդիա",
            'added'=> [],
            "fields" => [
              [
                "key" => "uploadedImgs",
                "title" => "Ավելացնել նկարներ",
                "type" => "imgsUpload",
                "style" => "639px",
                "value" => '',
                "option" => [],
              ],
              [
                "key" => "video",
                "title" => "Վիդեոյի հղում",
                "placeholder" => "Տեղադրեք հղումը",
                "type" => "inputText",
                "style" => "639px",
                "required" => false,
                "value" => '',
                "option" => [],
              ]
            ],
          ],
          [
            'name' => "keywords",
            'title'=> "Բանալի Բառեր",
            'added'=> [],
            "fields" => [
              [
                "key" => "chooseWords",
                "title" => "Ընտրել բառեր",
                "type" => "keyword",
                "style" => "631px",
                "required" => false,
                "value" => '',
                "option" => [],
              ],
            ],
          ],
          [
            'name' => "juridical",
            'title'=> "Իրավաբանական",
            'added'=> [],
            "fields" => [
              [
                "key" => "owner",
                "title" => "Սեփականատեր 1*",
                "placeholder" => "Գրեք սեփականատիրոջ անունը",
                "type" => "inputText",
                "style" => "412px",
                "required" => true,
                "value" => '',
              ],
              [
                "key" => "ownerTel",
                "title" => "Սեփականատիրոջ Հեռախոսահամար*",
                "type" => "inputNumber",
                "style" => "412px",
                "required" => true,
                "value" => '',
              ],
              [
                "key" => "addOwner",
                "title" => "Ավելացնել սեփականատեր",
                "type" => "addField",
                "style" => "217px",
                // "value" => '',
                "option" => [
                  [
                    "key" => "owner2",
                    "title" => "Սեփականատեր 2*",
                    "placeholder" => "Գրեք սեփականատիրոջ անունը",
                    "type" => "inputText",
                    "style" => "412px",
                    "value" => '',
                  ],
                  [
                    "key" => "ownerTel2",
                    "title" => "Սեփականատիրոջ Հեռախոսահամար*",
                    "type" => "inputNumber",
                    "style" => "412px",
                    "option" => [],
                    "value" => '',
                  ],
                  [
                    "key" => "owner3",
                    "title" => "Սեփականատեր 3*",
                    "placeholder" => "Գրեք սեփականատիրոջ անունը",
                    "type" => "inputText",
                    "style" => "412px",
                    "value" => '',
                  ],
                  [
                    "key" => "ownerTel3",
                    "title" => "Սեփականատիրոջ Հեռախոսահամար*",
                    "type" => "inputNumber",
                    "style" => "412px",
                    "option" => [],
                    "value" => '',
                  ],
                ],
              ],
            ],
          ],
          [
            'name' => "additionalInfo",
            'title'=> "Լրացուցիչ Ինֆորմացիա",
            'added'=> [],
            "fields" => [
              [
                "key" => "likelyInfo",
                "title" => "Գրեք նախընտրած ինֆորմացիան",
                "type" => "inputText",
                "style" => "412px",
                "height" => "80px",
                "required" => false,
                "value" => '',
                "option" => [],
              ],
              [
                "key" => "uploadFiles",
                "title" => "Կցել Փաստաթուղթ",
                "type" => "uploadFile",
                "style" => "217px",
                "value" => '',
                "option" => [],
              ],
            ],
          ],
          [
            'name' => "specialists",
            'title'=> "Կից Մասնագետներ",
            'added'=> [],
            "fields" => [
              [
                "key" => "agent",
                "title" => "Գործակալ*",
                "type" => "agentSelect",
                "style" => "412px",
                "required" => true,
                "value" => '',
                "option" => [],
              ],
              [
                "key" => "meneger",
                "title" => "Մենեջեր",
                "type" => "managerSelect",
                "style" => "412px",
                "required" => false,
                "value" => '',
                "option" => [],
              ],
            ],
          ],
        ]);
        $form->ru = json_encode([
            [
            'name' => "announcement",
            'title'=> "Объявление",
            'added'=> [],
            "fields" => [
                [
                "key" => "transactionType",
                "title" => "Тип операции*",
                "type" => "select",
                "style" => "306px",
                "value" => '',
                "selectedOptionName" => '',
                "option" => []
                ],
                [
                "key" => "propertyType",
                "title" => "Тип недвижимости*",
                "type" => "select",
                "style" => "306px",
                "value" => '',
                "option" => [ ]
                ],
                [
                "key" => "announcementTitle",
                "title" => "Название объявления*",
                "type" => "text",
                "style" => "629px",

                "value" => '',
                "option" => []
                ],
                [
                "key" => "announcementDesc",
                "title" => "ОПИСАНИЕ ЗАЯВЛЕНИЯ*",
                "type" => "text",
                "style" => "629px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "announcementType",
                "title" => "Тип объявления*",
                "type" => "select",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
            ]
            ],
            [
            'name' => "location",
            'title'=> "Расположение - Ереван",
            'added'=> [],
            "fields" => [
                [
                "key" => "community",
                "title" => "Административный район*",
                "type" => "communitySelect",
                "style" => "306px",
                "value" => '',
                "communityStreet" => [
                  "key" => "street",
                  "title" => "Улица*",
                  "type" => "selectStreet",
                  "style" => "283px",
                  "streetId" => '',
                  "required" => true,
                  "value" => '',
                  "option" => []
                ],
                "option" => []
                ],
                [
                "key" => "building",
                "title" => "Здание*",
                "type" => "inputNumber",
                "style" => "100px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "entrance",
                "title" => "Вход*",
                "type" => "inputNumber",
                "style" => "100px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "apartment",
                "title" => "Квартира*",
                "type" => "inputNumber",
                "style" => "100px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "map",
                "title" => "MAP PIN*",
                "type" => "map",
                "style" => "631px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "realAddress",
                "title" => "Настоящий Адрес*",
                "type" => "inputText",
                "style" => "629px",
                "placeholder" => "Адрес",
                "value" => '',
                "option" => []
                ],
            ]
            ],
            [
            'name' => "price",
            'title'=> "Цена",
            'added'=> [],
            "fields" => [
                [
                "key" => "totalPrice",
                "title" => "Общая сумма*",
                "type" => "inputNumberSingle",
                "style" => "202px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "priceNegotiable",
                "title" => "Цена договорная",
                "type" => "checkbox",
                "style" => "",
                "value" => 'on',
                "option" => []
                ],
                [
                "key" => "sqmPrice",
                "title" => "Цена/ кв. м.*",
                "type" => "inputNumberSingle",
                "style" => "202px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "downPayment",
                "title" => "Сумма авансового платежа",
                "type" => "inputNumberSingle",
                "style" => "202px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "paymentMethod",
                "title" => "Способ оплаты*",
                "type" => "multiselect",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "preferredBank",
                "title" => "Предпочтительный банк владельца*",
                "type" => "multiselect",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
            ]
            ],
            [
            'name' => "houseDescription",
            'title'=> "Описание дома",
            'added'=> [],
            "fields" => [
                [
                "key" => "surface",
                "title" => "Площадь*",
                "type" => "inputNumberSymbol",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "ceilingHeight",
                "title" => "Высота потолка*",
                "type" => "inputNumberSymbol",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "numberOfRooms",
                "title" => "Кол-во комнат*",
                "type" => "numSelect",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "numberOfBedrooms",
                "title" => "Количество спален*",
                "type" => "numSelect",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "numberOfBathrooms",
                "title" => "Количество туалетов*",
                "type" => "numSelect",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "numberOpenBalconies",
                "title" => "Кол-во открытых балконов*",
                "type" => "numSelect",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "numberCloseBalconies",
                "title" => "Кол-во закрытых балконов*",
                "type" => "numSelect",
                "style" => "629px",
                "value" => '',
                "option" => []
                ],
                [
                  "key" => "groundSurface",
                  "title" => "Поверхности суши",
                  "type" => "inputNumberSymbol",
                  "style" => "306px",
                  "required" => false,
                  "value" => '',
                  "option" => []
                ],
                [
                "key" => "floor",
                "title" => "Этаж*",
                "type" => "inputNumber",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "houseCondition",
                "title" => "Состояние квартиры*",
                "type" => "select",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "parking",
                "title" => "Парковка*",
                "type" => "select",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "kitchenType",
                "title" => "Тип кухни*",
                "type" => "select",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
            ]
            ],
            [
            'name' => "buildingDescription",
            'title'=> "Описание здания",
            'added'=> [],
            "fields" => [
            [
                "key" => "buildingType",
                "title" => "Тип здания*",
                "type" => "select",
                "style" => "306px",
                "value" => '',
                "option" => []
            ],
            [
                "key" => "statement",
                "title" => "Кольво этажей*",
                "placeholder" => "Ex.",
                "type" => "inputText",
                "style" => "306px",
                "value" => '',
                "option" => [],
            ],
            [
                "key" => "newBuilt",
                "type" => "checkbox",
                "title" => "Новостройка",
                "value" => 'on',
                "style" => "612px",
            ],
            [
                "key" => "buildingConstructionYear",
                "title" => "Дата строительства*",
                "type" => "inputNumber",
                "style" => "306px",
                "value" => '',
                "option" => [],
            ],
            [
                "key" => "orentation",
                "title" => "Ориентация*",
                "type" => "multiselect",
                "style" => "306px",
                "value" => '',
                "option" => []
            ],
            [
                "key" => "propertyTax",
                "title" => "Ежегодный налог на недвижимость*",
                "type" => "inputNumberSingle",
                "style" => "202px",
                "value" => '',
                "option" => []
            ],
            [
                "key" => "monthlyFee",
                "title" => "Ежемесячная плата за обслуживание*",
                "type" => "inputNumberSingle",
                "style" => "202px",
                "value" => '',
                "option" => []
            ],
            ]
            ],
            [
            'name' => "mainFacility",
            'title'=> "Утилиты",
            'added'=> [],
            "fields" => [
                [
                "key" => "individualHeatingSystem",
                "title" => "Индивидуальная система отопления",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "371px",
                ],
                [
                "key" => "electricity",
                "title" => "Электричество",
                "value" => 'on',
                "type" => "checkbox",
                ],
                [
                "key" => "centralizedHeatingSystem",
                "title" => "Центральная система отопления",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "371px",
                ],
                [
                "key" => "gas",
                "title" => "Газ",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "157px",
                ],
                [
                "key" => "airConditioner",
                "title" => "Кондиционер",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "371px",
                ],
                [
                "key" => "centralizedCoolingSystem",
                "title" => "Концентрированная система охлаждения",
                "type" => "checkbox",
                "value" => 'on',
                ],
            ],
            ],
            [
            'name' => "otherFacility",
            'title'=> "Другие удобства",
            'added'=> [],
            "fields" => [
                [
                "key" => "furniture",
                "title" => "Мебель",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "storageRoom",
                "title" => "Кладовка",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "technics",
                "title" => "Техника",
                "type" => "checkbox",
                "style" => "309px",
                "value" => 'on',
                ],
                [
                "key" => "wardrobe",
                "title" => "Гардероб",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "elevator",
                "title" => "Лифт",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "laundryRoom",
                "title" => "Прачечная",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "closedEconomyBalcony",
                "title" => "Закрытый балкон",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "park",
                "title" => "Парк",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "europeWindow",
                "title" => "Европейские окна",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "firstLine",
                "title" => "Первая линия",
                "value" => 'on',
                "type" => "checkbox",
                ],
                [
                "key" => "laminate",
                "title" => "Ламинат",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "courtyardBuilding",
                "title" => "Внутридворовое здание",
                "value" => 'on',
                "type" => "checkbox",
                ],
                [
                "key" => "parquetFloor",
                "title" => "Паркет",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "nearStop",
                "title" => "Рядом с остановкой",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "tiled",
                "title" => "Плиточный",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "sunnySide",
                "title" => "На солнечной стороне",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "presgranite",
                "title" => "Керамогранит",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "heatedFloor",
                "title" => "Тёплые полы",
                "value" => 'on',
                "type" => "checkbox",
                ],
                [
                "key" => "beautifulView",
                "title" => "Красивый вид",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                
                [
                "key" => "gate",
                "title" => "Ворота",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "securitySystem",
                "title" => "Система безопасности",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "fenced",
                "title" => "Огорожен",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "playground",
                "title" => "Детская площадка",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "twoWayEntry",
                "title" => "Двусторонний вход",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "bilateralPosition",
                "title" => "Двусторонняя позиция",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "ironDoor",
                "title" => "Железная дверь",
                "value" => 'on',
                "type" => "checkbox",
                ],
                [
                "key" => "sauna",
                "title" => "Сауна",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "loggia",
                "title" => "Лоджия",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "pool",
                "title" => "Бассейн",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "bottom",
                "title" => "Пол",
                "type" => "multiselect",
                "style" => "306px",
                "value" => '',
                "option" => [],
                ],
                [
                "key" => "roof",
                "title" => "Потолок",
                "type" => "multiselect",
                "style" => "306px",
                "value" => '',
                "option" => [],
                ],
                [
                "key" => "cover",
                "title" => "Покрытия",
                "type" => "multiselect",
                "style" => "306px",
                "value" => '',
                "option" => [],
                ],
            ],
            ],
            [
            'name' => "media",
            'title'=> "СМИ",
            'added'=> [],
            "fields" => [
                [
                "key" => "uploadedImgs",
                "title" => "Добавить фотографии",
                "type" => "imgsUpload",
                "style" => "639px",
                "value" => '',
                "option" => [],
                ],
                [
                "key" => "video",
                "title" => "Ссылка на видео*",
                "placeholder" => "Вставьте ссылку",
                "type" => "inputText",
                "style" => "639px",
                "value" => '',
                "option" => [],
                ]
            ],
            ],
            [
            'name' => "keywords",
            'title'=> "Ключевые слова",
            'added'=> [],
            "fields" => [
                [
                "key" => "chooseWords",
                "title" => "Выберите слова*",
                "type" => "keyword",
                "style" => "631px",
                "value" => '',
                "option" => [],
                ],
            ],
            ],
            [
            'name' => "juridical",
            'title'=> "Юридический",
            'added'=> [],
            "fields" => [
                [
                "key" => "owner",
                "title" => "Владелец 1*",
                "placeholder" => "Напишите имя владельца",
                "type" => "inputText",
                "style" => "412px",
                "value" => '',
                "option" => [],
                ],
                [
                "key" => "ownerTel",
                "title" => "Телефон владельца*",
                "type" => "inputNumber",
                "style" => "412px",
                "value" => '',
                "option" => [],
                ],
                [
                "key" => "addOwner",
                "title" => "Добавить владельца",
                "type" => "addField",
                "style" => "217px",
                "value" => '',
                "option" => [
                  [
                    "key" => "owner2",
                    "title" => "Владелец 2*",
                    "placeholder" => "Напишите имя владельца",
                    "type" => "inputText",
                    "style" => "412px",
                    "value" => '',
                  ],
                  [
                    "key" => "ownerTel2",
                    "title" => "Телефон владельца*",
                    "type" => "inputNumber",
                    "style" => "412px",
                    "option" => [],
                    "value" => '',
                  ],
                  [
                    "key" => "owner3",
                    "title" => "Владелец 3*",
                    "placeholder" => "Напишите имя владельца",
                    "type" => "inputText",
                    "style" => "412px",
                    "value" => '',
                  ],
                  [
                    "key" => "ownerTel3",
                    "title" => "Телефон владельца*",
                    "type" => "inputNumber",
                    "style" => "412px",
                    "option" => [],
                    "value" => '',
                  ],
                ],
                ],
            ],
            ],
            [
            'name' => "additionalInfo",
            'title'=> "Дополнительная информация",
            'added'=> [],
            "fields" => [
                [
                "key" => "likelyInfo",
                "title" => "Введите желаемую информацию*",
                "type" => "inputText",
                "style" => "412px",
                "height" => "80px",
                "value" => '',
                "option" => [],
                ],
                [
                "key" => "uploadFiles",
                "title" => "Прикрепить документ",
                "type" => "uploadFile",
                "style" => "217px",
                "value" => '',
                "option" => [],
                ],
            ],
            ],
            [
            'name' => "specialists",
            'title'=> "Дополнительные специалисты",
            'added'=> [],
            "fields" => [
                [
                "key" => "agent",
                "title" => "Агент*",
                "type" => "agentSelect",
                "style" => "412px",
                "value" => '',
                "option" => [],
                ],
                [
                "key" => "meneger",
                "title" => "Менеджер*",
                "type" => "managerSelect",
                "style" => "412px",
                "value" => '',
                "option" => [],
                ],
            ],
            ],
        ]);
        $form->en = json_encode([
            [
            'name' => "announcement",
            'title'=> "Announcement",
            'added'=> [],
            "fields" => [
                [
                "key" => "transactionType",
                "title" => "Transactions*",
                "type" => "select",
                "style" => "306px",
                "value" => '',
                "selectedOptionName" => '',
                "option" => []
                ],
                [
                "key" => "propertyType",
                "title" => "Property Type*",
                "type" => "select",
                "style" => "306px",
                "value" => '',
                "option" => [ ]
                ],
                [
                "key" => "announcementTitle",
                "title" => "Announcement Title*",
                "type" => "text",
                "style" => "629px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "announcementDesc",
                "title" => "APPLICATION DESCRIPTION*",
                "type" => "text",
                "style" => "629px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "announcementType",
                "title" => "Announcement Type*",
                "type" => "select",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
            ]
            ],
            [
            'name' => "location",
            'title'=> "Location - Yerevan",
            'added'=> [],
            "fields" => [
                [
                "key" => "community",
                "title" => "Administrative District*",
                "type" => "communitySelect",
                "style" => "306px",
                "value" => '',
                "communityStreet" => [
                  "key" => "street",
                  "title" => "Street*",
                  "type" => "selectStreet",
                  "style" => "283px",
                  "streetId" => '',
                  "required" => true,
                  "value" => '',
                  "option" => []
                ],
                "option" => []
                ],
                [
                "key" => "building",
                "title" => "Building*",
                "type" => "inputNumber",
                "style" => "100px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "entrance",
                "title" => "Entrance*",
                "type" => "inputNumber",
                "style" => "100px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "apartment",
                "title" => "Apartment*",
                "type" => "inputNumber",
                "style" => "100px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "map",
                "title" => "MAP PIN*",
                "type" => "map",
                "style" => "631px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "realAddress",
                "title" => "Real Adress*",
                "type" => "inputText",
                "style" => "629px",
                "placeholder" => "Adress",
                "value" => '',
                "option" => []
                ],
            ]
            ],
            [
            'name' => "price",
            'title'=> "Price",
            'added'=> [],
            "fields" => [
                [
                "key" => "totalPrice",
                "title" => "Total amount*",
                "type" => "inputNumberSingle",
                "style" => "202px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "priceNegotiable",
                "title" => "Price negotiable",
                "type" => "checkbox",
                "style" => "",
                "value" => 'on',
                "option" => []
                ],
                [
                "key" => "sqmPrice",
                "title" => "SQM /price*",
                "type" => "inputNumberSingle",
                "style" => "202px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "downPayment",
                "title" => "Advance payment amount",
                "type" => "inputNumberSingle",
                "style" => "202px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "paymentMethod",
                "title" => "Payment method:*",
                "type" => "multiselect",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "preferredBank",
                "title" => "Owner's preferred bank*",
                "type" => "multiselect",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
            ]
            ],
            [
            'name' => "houseDescription",
            'title'=> "Description of the house",
            'added'=> [],
            "fields" => [
                [
                "key" => "surface",
                "title" => "Area*",
                "type" => "inputNumberSymbol",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "ceilingHeight",
                "title" => "Ceiling height*",
                "type" => "inputNumberSymbol",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "numberOfRooms",
                "title" => "Number of rooms*",
                "type" => "numSelect",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "numberOfBedrooms",
                "title" => "Number of bedrooms*",
                "type" => "numSelect",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "numberOfBathrooms",
                "title" => "Number of toilets*",
                "type" => "numSelect",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "numberOpenBalconies",
                "title" => "Number of open balconies*",
                "type" => "numSelect",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "numberCloseBalconies",
                "title" => "Number of closed balconies*",
                "type" => "numSelect",
                "style" => "629px",
                "value" => '',
                "option" => []
                ],
                [
                  "key" => "groundSurface",
                  "title" => "Land Surface",
                  "type" => "inputNumberSymbol",
                  "style" => "306px",
                  "required" => false,
                  "value" => '',
                  "option" => []
                ],
                [
                "key" => "floor",
                "title" => "Floor*",
                "type" => "inputNumber",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "houseCondition",
                "title" => "Home Conditions*",
                "type" => "select",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "parking",
                "title" => "Parking lot*",
                "type" => "select",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
                [
                "key" => "kitchenType",
                "title" => "Kitchen type*",
                "type" => "select",
                "style" => "306px",
                "value" => '',
                "option" => []
                ],
            ]
            ],
            [
            'name' => "buildingDescription",
            'title'=> "Building Description",
            'added'=> [],
            "fields" => [
            [
                "key" => "buildingType",
                "title" => "Building type*",
                "type" => "select",
                "style" => "306px",
                "value" => '',
                "option" => []
            ],
            [
                "key" => "statement",
                "title" => "Number of floors*",
                "placeholder" => "Ex.",
                "type" => "inputText",
                "style" => "306px",
                "value" => '',
                "option" => [],
            ],
            [
                "key" => "newBuilt",
                "type" => "checkbox",
                "title" => "New-build",
                "value" => 'on',
                "style" => "612px",
            ],
            [
                "key" => "buildingConstructionYear",
                "title" => "Construction date*",
                "type" => "inputNumber",
                "style" => "306px",
                "value" => '',
                "option" => [],
            ],
            [
                "key" => "orentation",
                "title" => "Orientation*",
                "type" => "multiselect",
                "style" => "306px",
                "value" => '',
                "option" => []
            ],
            [
                "key" => "propertyTax",
                "title" => "Yearly property tax*",
                "type" => "inputNumberSingle",
                "style" => "202px",
                "value" => '',
                "option" => []
            ],
            [
                "key" => "monthlyFee",
                "title" => "Monthly service fee*",
                "type" => "inputNumberSingle",
                "style" => "202px",
                "value" => '',
                "option" => []
            ],
            ]
            ],
            [
            'name' => "mainFacility",
            'title'=> "Utilities",
            'added'=> [],
            "fields" => [
                [
                "key" => "individualHeatingSystem",
                "title" => "Individual heating system",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "371px",
                ],
                [
                "key" => "electricity",
                "title" => "Electricity",
                "value" => 'on',
                "type" => "checkbox",
                ],
                [
                "key" => "centralizedHeatingSystem",
                "title" => "Central heating system",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "371px",
                ],
                [
                "key" => "gas",
                "title" => "Gas",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "157px",
                ],
                [
                "key" => "airConditioner",
                "title" => "A/C",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "371px",
                ],
                [
                "key" => "centralizedCoolingSystem",
                "title" => "Concentrated cooling system",
                "type" => "checkbox",
                "value" => 'on',
                ],
            ],
            ],
            [
            'name' => "otherFacility",
            'title'=> "Other amenities",
            'added'=> [],
            "fields" => [
                [
                "key" => "furniture",
                "title" => "Furniture",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "storageRoom",
                "title" => "Pantry",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "technics",
                "title" => "Equipment",
                "type" => "checkbox",
                "style" => "309px",
                "value" => 'on',
                ],
                [
                "key" => "wardrobe",
                "title" => "Wardrobe",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "elevator",
                "title" => "Elevator",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "laundryRoom",
                "title" => "Laundry",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "closedEconomyBalcony",
                "title" => "Closed balcony",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "park",
                "title" => "Park",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "europeWindow",
                "title" => "European window",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "firstLine",
                "title" => "First line",
                "value" => 'on',
                "type" => "checkbox",
                ],
                [
                "key" => "laminate",
                "title" => "Laminate flooring",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "courtyardBuilding",
                "title" => "Courtyard building",
                "value" => 'on',
                "type" => "checkbox",
                ],
                [
                "key" => "parquetFloor",
                "title" => "Parquet",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "nearStop",
                "title" => "Near the stop",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "tiled",
                "title" => "Tiled",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "sunnySide",
                "title" => "Sun-facing",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "presgranite",
                "title" => "Porcelain stoneware",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "heatedFloor",
                "title" => "Heated floors",
                "value" => 'on',
                "type" => "checkbox",
                ],
                [
                "key" => "beautifulView",
                "title" => "Beautiful view",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                
                [
                "key" => "gate",
                "title" => "Gate",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "securitySystem",
                "title" => "Security system",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "fenced",
                "title" => "Fenced",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "playground",
                "title" => "Playground",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "twoWayEntry",
                "title" => "Two-way entrance",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "bilateralPosition",
                "title" => "Two-way position",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "ironDoor",
                "title" => "Iron door",
                "value" => 'on',
                "type" => "checkbox",
                ],
                [
                "key" => "sauna",
                "title" => "Sauna",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "loggia",
                "title" => "Loggia",
                "type" => "checkbox",
                "value" => 'on',
                ],
                [
                "key" => "pool",
                "title" => "Pool",
                "type" => "checkbox",
                "value" => 'on',
                "style" => "309px",
                ],
                [
                "key" => "bottom",
                "title" => "Floor",
                "type" => "multiselect",
                "style" => "306px",
                "value" => '',
                "option" => [],
                ],
                [
                "key" => "roof",
                "title" => "Ceiling",
                "type" => "multiselect",
                "style" => "306px",
                "value" => '',
                "option" => [],
                ],
                [
                "key" => "cover",
                "title" => "Wall-covering",
                "type" => "multiselect",
                "style" => "306px",
                "value" => '',
                "option" => [],
                ],
            ],
            ],
            [
            'name' => "media",
            'title'=> "Media",
            'added'=> [],
            "fields" => [
                [
                "key" => "uploadedImgs",
                "title" => "Add pictures",
                "type" => "imgsUpload",
                "style" => "639px",
                "value" => '',
                "option" => [],
                ],
                [
                "key" => "video",
                "title" => "Link to video*",
                "placeholder" => "Insert link",
                "type" => "inputText",
                "style" => "639px",
                "value" => '',
                "option" => [],
                ]
            ],
            ],
            [
            'name' => "keywords",
            'title'=> "Keywords",
            'added'=> [],
            "fields" => [
                [
                "key" => "chooseWords",
                "title" => "Select words*",
                "type" => "keyword",
                "style" => "631px",
                "value" => '',
                "option" => [],
                ],
            ],
            ],
            [
            'name' => "juridical",
            'title'=> "Juridical",
            'added'=> [],
            "fields" => [
                [
                "key" => "owner",
                "title" => "Owner 1*",
                "placeholder" => "Write the owner's name",
                "type" => "inputText",
                "style" => "412px",
                "value" => '',
                "option" => [],
                ],
                [
                "key" => "ownerTel",
                "title" => "Owner phone*",
                "type" => "inputNumber",
                "style" => "412px",
                "value" => '',
                "option" => [],
                ],
                [
                "key" => "addOwner",
                "title" => "Add owner",
                "type" => "addField",
                "style" => "217px",
                "value" => '',
                "option" => [
                  [
                    "key" => "owner2",
                    "title" => "Owner 2*",
                    "placeholder" => "Write the owner's name",
                    "type" => "inputText",
                    "style" => "412px",
                    "value" => '',
                  ],
                  [
                    "key" => "ownerTel2",
                    "title" => "Owner phone*",
                    "type" => "inputNumber",
                    "style" => "412px",
                    "option" => [],
                    "value" => '',
                  ],
                  [
                    "key" => "owner3",
                    "title" => "Owner 3*",
                    "placeholder" => "Write the owner's name",
                    "type" => "inputText",
                    "style" => "412px",
                    "value" => '',
                  ],
                  [
                    "key" => "ownerTel3",
                    "title" => "Owner phone*",
                    "type" => "inputNumber",
                    "style" => "412px",
                    "option" => [],
                    "value" => '',
                  ],
                ],
                ],
            ],
            ],
            [
            'name' => "additionalInfo",
            'title'=> "Additional Information",
            'added'=> [],
            "fields" => [
                [
                "key" => "likelyInfo",
                "title" => "Enter the desired information*",
                "type" => "inputText",
                "style" => "412px",
                "height" => "80px",
                "value" => '',
                "option" => [],
                ],
                [
                "key" => "uploadFiles",
                "title" => "Attach Document",
                "type" => "uploadFile",
                "style" => "217px",
                "value" => '',
                "option" => [],
                ],
            ],
            ],
            [
            'name' => "specialists",
            'title'=> "Additional Specialists",
            'added'=> [],
            "fields" => [
                [
                "key" => "agent",
                "title" => "Agent*",
                "type" => "agentSelect",
                "style" => "412px",
                "value" => '',
                "option" => [],
                ],
                [
                "key" => "meneger",
                "title" => "Manager*",
                "type" => "managerSelect",
                "style" => "412px",
                "value" => '',
                "option" => [],
                ],
            ],
            ],
        ]);
        $form->save();

    }
}
