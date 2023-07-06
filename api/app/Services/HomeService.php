<?php
namespace App\Services;

use App\Models\GlobalForm;
use App\Models\ConfigAddress;
use App\Models\Employe;
use App\Models\Home;
use Carbon\Carbon;


class HomeService
{

  public function getAllSelect()
  {
    $allSelect = [
      'sale' => [
        'am' => 'Վաճառք',
        'en' => 'For Sale',
        'ru' => 'Продается',
      ],
      'rent' => [
        'am' => 'Վարձակալություն',
        'en' => 'For Rent',
        'ru' => 'Aрендa',
      ],
      'house' => [
        'am' => 'Բնակարան',
        'en' => 'House',
        'ru' => 'Квартира',
      ],
      'privateHouse' => [
        'am' => 'Առանձնատուն',
        'en' => 'Private House',
        'ru' => 'Дом',
      ],
      'commercialHouse' => [
        'am' => 'Կոմերցիոն (առանձնատուն)',
        'en' => 'Commercial territory',
        'ru' => 'Коммерческая площадь',
      ],
      'commercialApartment' => [
        'am' => 'Կոմերցիոն (բնակարան)',
        'en' => 'Commercial Appartment',
        'ru' => 'Коммерческая площадь',
      ],
      'simple' => [
        'am' => 'Հասարակ',
        'en' => 'Regular',
        'ru' => 'Обычный',
      ],
      'top' => [
        'am' => 'Տոպ',
        'en' => 'Top',
        'ru' => 'Топ',
      ],
      'urgent' => [
        'am' => 'Շտապ',
        'en' => 'Urgent',
        'ru' => 'Срочно',
      ],
      'ajapnyak2' => [
        'am' => 'Աջափնյակ',
        'en' => 'Ajapnyak',
        'ru' => 'Аджапняк',
        'id' => 2
      ],
      'arabkir3' => [
        'am' => 'Արաբկիր',
        'en' => 'Arabkir',
        'ru' => 'Арабкир',
        'id' => 3
      ],
      'avan4' => [
        'am' => 'Ավան',
        'en' => 'Avan',
        'ru' => 'Аван',
        'id' => 4
      ],
      'davtashen5' => [
        'am' => 'Դավթաշեն',
        'en' => 'Davtashen',
        'ru' => 'Давташен',
        'id' => 5
      ],
      'erebuni6' => [
        'am' => 'Էրեբունի',
        'en' => 'Erebuni',
        'ru' => 'Эребуни',
        'id' => 6
      ],
      'zeytun7' => [
        'am' => 'Քանաքեռ-Զեյթուն',
        'en' => 'Kanaker-Zeytun',
        'ru' => 'Канакер-Зейтун',
        'id' => 7
      ],
      'kentron8' => [
        'am' => 'Կենտրոն',
        'en' => 'Kentron',
        'ru' => 'Кентрон',
        'id' => 8
      ],
      'malatia9' => [
        'am' => 'Մալաթիա-Սեբաստիա',
        'en' => 'Malatia-Sebastia',
        'ru' => 'Малатия-Себастия',
        'id' => 9
      ],
      'norqMarash10' => [
        'am' => 'Նորք-Մարաշ',
        'en' => 'Nork-Marash',
        'ru' => 'Норк-Мараш',
        'id' => 10
      ],
      'norNorq11' => [
        'am' => 'Նոր Նորք',
        'en' => 'Nor Nork',
        'ru' => 'Нор Норк',
        'id' => 11
      ],
      'nubarashen12' => [
        'am' => 'Նուբարաշեն',
        'en' => 'Nubarashen',
        'ru' => 'Нубарашен',
        'id' => 12
      ],
      'shengavit13' => [
        'am' => 'Շենգավիթ',
        'en' => 'Shengavit',
        'ru' => 'Шенгавит',
        'id' => 13
      ],
      'vahagni14' => [
        'am' => 'Վահագնի թաղամաս',
        'en' => 'Vahagni',
        'ru' => 'Ваганы',
        'id' => 15
      ],
      'other' => [
        'am' => 'Այլ',
        'en' => 'Other',
        'ru' => 'Другой',
      ],
      'bankTransfer' => [
        'am' => 'Բանկային փոխանցում',
        'en' => 'Bank transfer',
        'ru' => 'Банковский перевод',
      ],
      'mortgageLoan' => [
        'am' => 'Հիպոթեքային վարկ',
        'en' => 'Mortgage',
        'ru' => 'Ипотечный заем',
      ],
      'ameriaBank' => [
        'am' => 'Ամերիա բանկ',
        'en' => 'Ameria Bank',
        'ru' => 'Америя Банк',
      ],
      'evocaBank' => [
        'am' => 'Էվոկաբանկ',
        'en' => 'Evocabank',
        'ru' => 'Эвокабанк',
      ],
      'inecoBank' => [
        'am' => 'Ինեկոբանկ',
        'en' => 'Inecobank',
        'ru' => 'Инекобанк',
      ],
      'idBank' => [
        'am' => 'ԱյԴի բանկ',
        'en' => 'ID Bank',
        'ru' => 'ID Банк',
      ],
      'acbaBank' => [
        'am' => 'Ակբա բանկ',
        'en' => 'Akba Bank',
        'ru' => 'Акба Банк',
      ],
      'mellatBank' => [
        'am' => 'Մելլաթ բանկ',
        'en' => 'Mellat Bank',
        'ru' => 'Меллат Банк',
      ],
      'armeconomBank' => [
        'am' => 'ՀայԷկոնոմ բանկ',
        'en' => 'Arm Economy Bank',
        'ru' => 'Арм эконом банк',
      ],
      'HSBC' => [
        'am' => 'HSBC բանկ',
        'en' => 'HSBC bank',
        'ru' => 'HSBC Банк',
      ],
      'uniBank' => [
        'am' => 'Յունիբանկ',
        'en' => 'Unibank',
        'ru' => 'Юнибанк',
      ],
      'armbusinessMank' => [
        'am' => 'Հայբիզնեսբանկ',
        'en' => 'Armbusiness Bank',
        'ru' => 'Армбизнес Банк',
      ],
      'converseBank' => [
        'am' => 'Կոնվերս բանկ',
        'en' => 'Converse Bank',
        'ru' => 'Конверс Банк',
      ],
      'araratBank' => [
        'am' => 'Արարատ բանկ',
        'en' => 'Ararat Bank',
        'ru' => 'Арарат Банк',
      ],
      'fastBank' => [
        'am' => 'Ֆասթ բանկ',
        'en' => 'Fast bank',
        'ru' => 'Фаст банк',
      ],
      'armswissBank' => [
        'am' => 'Արմսվիսբանկ',
        'en' => 'Armswissbank',
        'ru' => 'Армсвисбанк',
      ],
      'artsakh' => [
        'am' => 'Արցախ բանկ',
        'en' => 'Artsakh Bank',
        'ru' => 'Арцах Банк',
      ],
      'biblos' => [
        'am' => 'Բիբլոս Բանկ Արմենիա',
        'en' => 'Byblos Bank Armenia',
        'ru' => 'Библос Банк Армения',
      ],
      'ardshin' => [
        'am' => 'Արդշինբանկ',
        'en' => 'Ardshinbank',
        'ru' => 'Ардшинбанк',
      ],
      'vtb' => [
        'am' => 'ՎՏԲ-Հայաստան բանկ',
        'en' => 'VTB-Armenia Bank',
        'ru' => 'ВТБ-Армения Банк',
      ],
      'stateCondition' => [
        'am' => 'Պետական վիճակ',
        'en' => 'State condition',
        'ru' => 'Гос. состояние',
      ],
      'good' => [
        'am' => 'Լավ',
        'en' => 'Good',
        'ru' => 'Хороший',
      ],
      'zero' => [
        'am' => 'Զրոյական',
        'en' => 'Zero',
        'ru' => 'Нулевое',
      ],
      'renovated' => [
        'am' => 'Վերանորոգված',
        'en' => 'Renovated',
        'ru' => 'Отремонтировано',
      ],
      'stone' => [
        'am' => 'Քարե',
        'en' => 'Stone',
        'ru' => 'Камень',
      ],
      'underground' => [
        'am' => 'Ստորգետնյա',
        'en' => 'Underground',
        'ru' => 'Подземный',
      ],
      'openParking' => [
        'am' => 'Բաց ավտոկայանատեղի,',
        'en' => 'Open parking',
        'ru' => 'Открытая парковка',
      ],
      'freeSpace' => [
        'am' => 'Ազատ տարածություն',
        'en' => 'Free space ',
        'ru' => 'Свободное место',
      ],
      'separately' => [
        'am' => 'Առանձին',
        'en' => 'Separate',
        'ru' => 'Отдельный',
      ],
      'studio' => [
        'am' => 'Ստուդիո',
        'en' => 'Studio',
        'ru' => 'Студия',
      ],
      'notDesigned' => [
        'am' => 'Նախագծված չէ',
        'en' => 'Not designed',
        'ru' => 'Не предназначен',
      ],
      'monolith' => [
        'am' => 'Մոնոլիտ',
        'en' => 'Monolithic',
        'ru' => 'Монолитный',
      ],
      'panel' => [
        'am' => 'Պանելային',
        'en' => 'Panel building',
        'ru' => 'Панельный',
      ],
      'north' => [
        'am' => 'Հյուսիսային',
        'en' => 'North',
        'ru' => 'Северный',
      ],
      'south' => [
        'am' => 'Հարավային',
        'en' => 'South',
        'ru' => 'Южный',
      ],
      'east' => [
        'am' => 'Արևելյան',
        'en' => 'East',
        'ru' => 'Восточный',
      ],
      'west' => [
        'am' => 'Արևմտյան',
        'en' => 'West',
        'ru' => 'Западный',
      ],
      'southEast' => [
        'am' => 'Հարավ-Արևելյան',
        'en' => 'South-Eastern',
        'ru' => 'Юго-Восточный',
      ],
      'southWest' => [
        'am' => 'Հարավ-Արևմտյան',
        'en' => 'South-Western',
        'ru' => 'Юго-Западный',
      ],
      'northEast' => [
        'am' => 'Հյուսիս-Արևելյան',
        'en' => 'North-Eastern',
        'ru' => 'Северо-Восточный',
      ],
      'northWest' => [
        'am' => 'Հյուսիս-Արևմտյան',
        'en' => 'North-Western',
        'ru' => 'Северо-Западный',
      ],
      'parquetFloor' => [
        'am' => 'Մանրահատակ',
        'en' => 'Parquet',
        'ru' => 'Паркет',
      ],
      'laminate' => [
        'am' => 'Լամինատ',
        'en' => 'Laminate flooring',
        'ru' => 'Ламинат',
      ],
      'tile' => [
        'am' => 'Սալիկ',
        'en' => 'Tile',
        'ru' => 'Плитка',
      ],
      'concrete' => [
        'am' => 'Բետոն',
        'en' => 'Concrete',
        'ru' => 'Бетон',
      ],
      'baghdad' => [
        'am' => 'Բաղդադ',
        'en' => 'Baghdad',
        'ru' => 'Багдад',
      ],
      'concrete' => [
        'am' => 'Բետոն',
        'en' => 'Concrete',
        'ru' => 'Бетон',
      ],
      'panelCover' => [
        'am' => 'Պանել',
        'en' => 'Panel',
        'ru' => 'Панельный',
      ],
      'tensile' => [
        'am' => 'Ձգվող',
        'en' => 'Stretch',
        'ru' => 'Натяжной',
      ],
      'suspended' => [
        'am' => 'Կախովի',
        'en' => 'Suspended',
        'ru' => 'Подвесной',
      ],
      '' => [
        'am' => '',
        'en' => '',
        'ru' => '',
      ],
    ];
    return $allSelect;
  }

  public function homeLanguageContsructor($data)
  {
    $allSelect = $this->getAllSelect();
    $keysAm = [];
    $keysRu = [];
    $keysEn = [];
    $generalForm = GlobalForm::findorFail(1);
    $copyGeneralFormAm = json_decode($generalForm->am);
    $copyGeneralFormRu = json_decode($generalForm->ru);
    $copyGeneralFormEn = json_decode($generalForm->en);
    $priceHistory = 0;

    foreach ($copyGeneralFormAm as $key => $item) {
      $keysAm[] = $item->name;
    }
    foreach ($copyGeneralFormRu as $key => $item) {
      $keysRu[] = $item->name;
    }
    foreach ($copyGeneralFormEn as $key => $item) {
      $keysEn[] = $item->name;
    }

    $assocCopyFormAm = array_combine($keysAm, $copyGeneralFormAm);
    $assocCopyFormRu = array_combine($keysRu, $copyGeneralFormRu);
    $assocCopyFormEn = array_combine($keysEn, $copyGeneralFormEn);

    foreach ($data as $idx => $item) {
      foreach ($item as $key => $value) {
        if (strpos($key, "Added")) {
          foreach ($assocCopyFormAm[$idx]->added as $globKey => $globalVal) {
            if ($key === $globalVal->key) {
              foreach ($value as $indText => $textItem) {
                if ($indText) {
                  $langKey = strtolower(substr($indText, -2));
                  if ($langKey == 'am') {
                    $assocCopyFormAm[$idx]->added[$globKey]->value = $textItem;
                  }
                  if ($langKey == 'ru') {
                    $assocCopyFormRu[$idx]->added[$globKey]->value = $textItem;
                  }
                  if ($langKey == 'en') {
                    $assocCopyFormEn[$idx]->added[$globKey]->value = $textItem;
                  }
                }
              }
              $assocCopyFormAm[$idx]->added[$globKey]->allAnswers = $value;
            }
          }
        } else {
          foreach ($assocCopyFormAm[$idx]->fields as $globKey => $globalVal) {
            if ($globalVal->type == 'select') {
              if ($key === $globalVal->key) {
                  $lang = $allSelect[$value];
                  if ($globalVal->key == 'transactionType') {
                    $assocCopyFormAm[$idx]->fields[$globKey]->selectedOptionName = $value;
                    $assocCopyFormRu[$idx]->fields[$globKey]->selectedOptionName = $value;
                    $assocCopyFormEn[$idx]->fields[$globKey]->selectedOptionName = $value;
                  }
                  $assocCopyFormAm[$idx]->fields[$globKey]->value = $lang['am'];
                  $assocCopyFormRu[$idx]->fields[$globKey]->value = $lang['ru'];
                  $assocCopyFormEn[$idx]->fields[$globKey]->value = $lang['en'];
              }
            }
            if ($globalVal->type == 'communitySelect') {
              if ($key === $globalVal->key) {
                $lang = $allSelect[$value];
                $assocCopyFormAm[$idx]->fields[$globKey]->communityId = $lang['id'];
                $assocCopyFormAm[$idx]->fields[$globKey]->value = $lang['am'];
                $assocCopyFormRu[$idx]->fields[$globKey]->value = $lang['ru'];
                $assocCopyFormEn[$idx]->fields[$globKey]->value = $lang['en'];
                if (array_key_exists('street', $item)) {
                  $addresses = ConfigAddress::find($item['street']);
                  if($addresses) {
                    $assocCopyFormAm[$idx]->fields[$globKey]->communityStreet->streetId = $item['street'];
                    $assocCopyFormAm[$idx]->fields[$globKey]->communityStreet->value = $addresses->am;
                    $assocCopyFormRu[$idx]->fields[$globKey]->communityStreet->value = $addresses->ru;
                    $assocCopyFormEn[$idx]->fields[$globKey]->communityStreet->value = $addresses->en;
                  } else {
                    $assocCopyFormAm[$idx]->fields[$globKey]->communityStreet->streetId = 0;
                  }
                }
              }
            }
            if ($globalVal->type == "text") {
              if ($key === $globalVal->key) {
                foreach ($value as $indText => $textItem) {
                  if ($indText) {
                    $langKey = strtolower(substr($indText, -2));
                    if ($langKey == 'am') {
                      $assocCopyFormAm[$idx]->fields[$globKey]->value = $textItem;
                    }
                    if ($langKey == 'ru') {
                      $assocCopyFormRu[$idx]->fields[$globKey]->value = $textItem;
                    }
                    if ($langKey == 'en') {
                      $assocCopyFormEn[$idx]->fields[$globKey]->value = $textItem;
                    }
                  }
                }
                $assocCopyFormAm[$idx]->fields[$globKey]->allAnswers = $value;
              }
            }
            if ($globalVal->type == "inputNumber") {
              if ($key === $globalVal->key) {
                $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
              }
            }

            if ($globalVal->type == "map") {
              if ($key === $globalVal->key) {
                  $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                  $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                  $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
              }
            }

            if ($globalVal->type == "inputText") {
              if ($key === $globalVal->key) {
                  $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                  $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                  $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
              }
            }
            if (array_key_exists('juridical', $data)) {
              if (array_key_exists('owner2', $data['juridical'])) {
                $assocCopyFormAm['juridical']->fields[2]->option[0]->value = $data['juridical']['owner2'];
                $assocCopyFormRu['juridical']->fields[2]->option[0]->value = $data['juridical']['owner2'];
                $assocCopyFormEn['juridical']->fields[2]->option[0]->value = $data['juridical']['owner2'];
              }
              if (array_key_exists('ownerTel2', $data['juridical'])) {
                $assocCopyFormAm['juridical']->fields[2]->option[1]->value = $data['juridical']['ownerTel2'];
                $assocCopyFormRu['juridical']->fields[2]->option[1]->value = $data['juridical']['ownerTel2'];
                $assocCopyFormEn['juridical']->fields[2]->option[1]->value = $data['juridical']['ownerTel2'];
              }
              if (array_key_exists('owner3', $data['juridical'])) {
                $assocCopyFormAm['juridical']->fields[2]->option[2]->value = $data['juridical']['owner3'];
                $assocCopyFormRu['juridical']->fields[2]->option[2]->value = $data['juridical']['owner3'];
                $assocCopyFormEn['juridical']->fields[2]->option[2]->value = $data['juridical']['owner3'];
              }
              if (array_key_exists('ownerTel3', $data['juridical'])) {
                $assocCopyFormAm['juridical']->fields[2]->option[3]->value = $data['juridical']['ownerTel3'];
                $assocCopyFormRu['juridical']->fields[2]->option[3]->value = $data['juridical']['ownerTel3'];
                $assocCopyFormEn['juridical']->fields[2]->option[3]->value = $data['juridical']['ownerTel3'];
              }
            }
            if ($globalVal->type == "inputNumberSingle") {
              if ($key === $globalVal->key) {
                if ($assocCopyFormAm[$idx]->name == 'price' && $assocCopyFormAm[$idx]->fields[$globKey]->key == "totalPrice") {
                  if (!(isset($item["priceNegotiable"]) && $item["priceNegotiable"] !== "on")) {
                    $priceHistory = $value;

                    $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                    $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                    $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
                  }
                } else {
                  $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                  $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                  $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
                }
              }

            }

            if ($globalVal->type == "inputNumberSymbol") {
              if ($key === $globalVal->key) {
                $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
              }
            }
            if ($globalVal->type == "agentSelect" || $globalVal->type == "managerSelect") {
              if ($key === $globalVal->key) {
                $employe = Employe::find($value);
                if($employe){
                  $assocCopyFormAm[$idx]->fields[$globKey]->value = json_decode($employe->full_name)->am;
                  $assocCopyFormRu[$idx]->fields[$globKey]->value = json_decode($employe->full_name)->ru;
                  $assocCopyFormEn[$idx]->fields[$globKey]->value = json_decode($employe->full_name)->en;
                } else {
                  $assocCopyFormAm[$idx]->fields[$globKey]->value = "";
                  $assocCopyFormRu[$idx]->fields[$globKey]->value = "";
                  $assocCopyFormEn[$idx]->fields[$globKey]->value = "";
                }
              }
            }
            if ($globalVal->type == 'multiselect') {
              if ($key === $globalVal->key) {
                $itemsAm = [];
                $itemsRu = [];
                $itemsEn = [];
                foreach ($value as $multiKey => $multiItem) {
                  $lang = $allSelect[$multiItem];
                  $itemsAm[] = $lang['am'];
                  $itemsRu[] = $lang['ru'];
                  $itemsEn[] = $lang['en'];
                }
                $assocCopyFormAm[$idx]->fields[$globKey]->value = implode(", ", $itemsAm);
                $assocCopyFormRu[$idx]->fields[$globKey]->value = implode(", ", $itemsRu);
                $assocCopyFormEn[$idx]->fields[$globKey]->value = implode(", ", $itemsEn);
              }
            }
            if ($globalVal->type == "checkbox") {
              if ($key === $globalVal->key) {
                $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
              }
            }
            if ($globalVal->type == "numSelect") {
              if ($key === $globalVal->key) {
                if($value == "Studio"){
                  $lang = $allSelect[strtolower($value)];
                  $assocCopyFormAm[$idx]->fields[$globKey]->value = $lang['am'];
                  $assocCopyFormRu[$idx]->fields[$globKey]->value = $lang['ru'];
                  $assocCopyFormEn[$idx]->fields[$globKey]->value = $lang['en'];
                } else {
                  $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                  $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                  $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
                }
              }
            }
          }
        }
      }
    }

    $normalArrayAm = array_values($assocCopyFormAm);
    $normalArrayRu = array_values($assocCopyFormRu);
    $normalArrayEn = array_values($assocCopyFormEn);
    return ['am' => $normalArrayAm, 'ru' => $normalArrayRu, 'en' => $normalArrayEn, 'priceHistory' => $priceHistory];
  }

  // public function removeFilteredKeyStart($filters){
  //   $newArray = array_combine(
  //     array_map(function ($key) {
  //         return str_replace("prop_", "", $key);
  //     }, array_keys($filters)),
  //     $filters
  // );
  // return $newArray;
  // }

  public function getStatusFilter($status) {
    if($status){
      if($status == "Ակտիվ"){
        return 'approved';
      }
      elseif($status == "Ապաակտիվացված") {
        return 'inactive';
      }
      elseif($status == "Ապաակտիվացված") {
        return 'inactive';
      }
      elseif($status == "Վերանայման") {
        return 'moderation';
      }
      elseif($status == "Արխիվացված") {
        return 'archived';
      }
      else {
        return '';
      }
    }
  }
  

  public function getFilteredHomes($allHome, $data) {
    $filteredHome = $allHome->filter(function ($home) use ($data){
      $am = json_decode($home->am);
      $ru = json_decode($home->ru);
      $en = json_decode($home->en);
      $isMatched = true;
      if(array_key_exists('prop_transactionType', $data)){
        if( $data['prop_transactionType'] != 'Վաճառք / վարձ.'){
          if($am[0]->fields[0]->value != $data['prop_transactionType']) {
            $isMatched = false;
          };
        }
      } 
      if(array_key_exists('prop_propertyType', $data)){
        if($data['prop_propertyType'] != "Գույքի տիպ"){
          if($am[0]->fields[1]->value != $data['prop_propertyType']){
            $isMatched = false;
          };
        }
      }
      if(array_key_exists('prop_community', $data)){
        if($data['prop_community'] != "Համայնք"){
          if($am[1]->fields[0]->value != $data['prop_community']) {
            $isMatched = false;
          };
        }
      }
      if(array_key_exists('prop_numberOfRooms', $data)){
        if($data['prop_numberOfRooms'] != "Սենյակներ"){
          if($am[3]->fields[2]->value != $data['prop_numberOfRooms']) {
            $isMatched = false;
          };
        }
      }
      if(array_key_exists('prop_minPrice', $data) || array_key_exists('prop_maxPrice', $data) ||  (array_key_exists('prop_minPrice', $data) && array_key_exists('prop_maxPrice', $data))){ 
        $minPrice = (array_key_exists('prop_minPrice', $data) && $data['prop_minPrice'])?(int)$data['prop_minPrice']:0;
        $maxPrice = (array_key_exists('prop_maxPrice', $data) && $data['prop_maxPrice'])?(int)$data['prop_maxPrice']:1000000000;
        $totalPrice = (int) $am[2]->fields[0]->value;
        if((array_key_exists('prop_minPrice', $data) && $data['prop_minPrice']) || (array_key_exists('prop_maxPrice', $data) && $data['prop_maxPrice'])) {
          if ($totalPrice < $minPrice || $totalPrice > $maxPrice) {
              $isMatched = false;
          }
        }
      } 
      if(array_key_exists('prop_buildingType', $data)){
        if($data['prop_buildingType'] != "Շինության տիպ"){
          if($am[4]->fields[0]->value != $data['prop_buildingType']){
            $isMatched = false;
          };
        }
      }
      if(array_key_exists('prop_houseCondition', $data)){
        if($data['prop_houseCondition'] != "Վիճակ"){
          if($am[3]->fields[9]->value != $data['prop_houseCondition']) {
            $isMatched = false;
          };
        }
      }
      if(array_key_exists('prop_floor', $data)){
        if($data['prop_floor']){
          if($am[3]->fields[8]->value != $data['prop_floor']) {
            $isMatched = false;
          };
        }
      }
      if(array_key_exists('prop_statement', $data)){
        if($data['prop_statement']){
          if($am[4]->fields[1]->value!= $data['prop_statement']) {
            $isMatched = false;
          };
        }
      }
      if(array_key_exists('prop_status', $data)){
        if($data['prop_status'] != "Ստատուս"){
          if($home->status != $this->getStatusFilter($data['prop_status'])) {
            $isMatched = false;
          };
        }
      }
      if(array_key_exists('prop_minSquare', $data) || array_key_exists('prop_maxSquare', $data) ||  (array_key_exists('prop_minSquare', $data) && array_key_exists('prop_maxSquare', $data))){ 
        $minSquare = (array_key_exists('prop_minSquare', $data) && $data['prop_minSquare'])?(int)$data['prop_minSquare']:0;
        $maxSquare = (array_key_exists('prop_maxSquare', $data) && $data['prop_maxSquare'])?(int)$data['prop_maxSquare']:1000000000;
        $surface = (int) $am[3]->fields[0]->value;
        if((array_key_exists('prop_minSquare', $data) && $data['prop_minSquare']) || (array_key_exists('prop_maxSquare', $data) && $data['prop_maxSquare'])) {
          if ($surface < $minSquare || $surface > $maxSquare) {
              $isMatched = false;
          }
        }

      }


      $searchAllProperty = [];
      if(isset($am[0]->fields[2]->value)){
       array_push($searchAllProperty, $am[0]->fields[2]->value);
       array_push($searchAllProperty, $ru[0]->fields[2]->value);
       array_push($searchAllProperty, $en[0]->fields[2]->value);
      }
      if(isset($am[1]->fields[0]->communityStreet->value)){
           array_push($searchAllProperty, $am[1]->fields[0]->communityStreet->value);
           array_push($searchAllProperty, $ru[1]->fields[0]->communityStreet->value);
           array_push($searchAllProperty, $en[1]->fields[0]->communityStreet->value);
      }

      if(isset($am[9]->fields[1]->value)){ 
       array_push($searchAllProperty, $am[9]->fields[1]->value);
      }

      if(isset( $am[9]->fields[2]->option[1]->value)){ 
       array_push($searchAllProperty,  $am[9]->fields[2]->option[1]->value);
      }
     
      if(isset( $am[9]->fields[2]->option[3]->value)){ 
       array_push($searchAllProperty,  $am[9]->fields[2]->option[3]->value);
      }

      if(isset($am[9]->fields[0]->value)){ 
       array_push($searchAllProperty, $am[9]->fields[0]->value);
      }

      if(isset( $am[9]->fields[2]->option[0]->value)){ 
       array_push($searchAllProperty,  $am[9]->fields[2]->option[0]->value);
      }
     
      if(isset( $am[9]->fields[2]->option[2]->value)){ 
       array_push($searchAllProperty,  $am[9]->fields[2]->option[2]->value);
      }

      if(isset($am[11]->fields[0]->value)){ 
       array_push($searchAllProperty, $am[11]->fields[0]->value);
      }
      if(isset($ru[11]->fields[0]->value)){ 
       array_push($searchAllProperty, $ru[11]->fields[0]->value);
      }
      if(isset($en[11]->fields[0]->value)){ 
       array_push($searchAllProperty, $en[11]->fields[0]->value);
      }
      if(isset($am[11]->fields[1]->value)){ 
       array_push($searchAllProperty, $am[11]->fields[1]->value);
      }
      if(isset($ru[11]->fields[1]->value)){ 
       array_push($searchAllProperty, $ru[11]->fields[1]->value);
      }
      if(isset($en[11]->fields[1]->value)){ 
       array_push($searchAllProperty, $en[11]->fields[1]->value);
      }

      array_push($searchAllProperty, $home->home_id);
      $home->searchAllProperty = $searchAllProperty;
      $home->am = json_decode($home->am);
      $home->ru = json_decode($home->ru);
      $home->en = json_decode($home->en);
      $home->selectedTransationType = isset($am[0]->fields[0]->selectedOptionName)?$am[0]->fields[0]->selectedOptionName: '';
      $home->photo = json_decode($home->photo);
      $home->file = json_decode($home->file);
      $home->createdAt = Carbon::parse($home->created_at)->format('d/m/Y');
      $home->updatedAt = Carbon::parse($home->updated_at)->format('d/m/Y');
      
      $home->keywords = json_decode($home->keywords);

      return $isMatched;
    })->values();
      return $filteredHome;
  }

  public function addEditYandexLocation($id, $data) {
    if($data){
      $home = Home::find($id);
      if($home) {
          $homeAm = json_decode($home->am);
          $homeRu = json_decode($home->ru);
          $homeEn = json_decode($home->en);

          if($homeAm[1]->name == 'location'){
              $homeAm[1] = (array) $homeAm[1];
              $homeAm[1]['fields'][4]->value = $data;
          }
          if($homeRu[1]->name == 'location'){
              $homeRu[1] = (array) $homeRu[1];
              $homeRu[1]['fields'][4]->value = $data;
          }
          if($homeEn[1]->name == 'location'){
              $homeEn[1] = (array) $homeEn[1];
              $homeEn[1]['fields'][4]->value = $data;
          }

          $home->am = json_encode($homeAm);
          $home->ru = json_encode($homeRu);
          $home->en = json_encode($homeEn);

          $home->save();
      }
  }
  return true;
}

  public function homeLanguageContsructorEdit($id, $data)
  {
    $allSelect = $this->getAllSelect();
    $editHomeStatus = false;
    $keysAm = [];
    $keysRu = [];
    $keysEn = [];
    $generalForm = Home::findorFail($id);
    $copyGeneralFormAm = json_decode($generalForm->am);
    $copyGeneralFormRu = json_decode($generalForm->ru);
    $copyGeneralFormEn = json_decode($generalForm->en);
    $priceHistory = 0;

    foreach ($copyGeneralFormAm as $key => $item) {
      $keysAm[] = $item->name;
    }
    foreach ($copyGeneralFormRu as $key => $item) {
      $keysRu[] = $item->name;
    }
    foreach ($copyGeneralFormEn as $key => $item) {
      $keysEn[] = $item->name;
    }

    $assocCopyFormAm = array_combine($keysAm, $copyGeneralFormAm);
    $assocCopyFormRu = array_combine($keysRu, $copyGeneralFormRu);
    $assocCopyFormEn = array_combine($keysEn, $copyGeneralFormEn);
    foreach ($data as $idx => $item) {
      foreach ($item as $key => $value) {
        if (strpos($key, "Added")) {
          foreach ($assocCopyFormAm[$idx]->added as $globKey => $globalVal) {
            if ($key === $globalVal->key) {
              foreach ($value as $indText => $textItem) {
                if ($indText) {
                  $langKey = strtolower(substr($indText, -2));
                  if ($langKey == 'am') {
                    $assocCopyFormAm[$idx]->added[$globKey]->value = $textItem;
                  }
                  if ($langKey == 'ru') {
                    $assocCopyFormRu[$idx]->added[$globKey]->value = $textItem;
                  }
                  if ($langKey == 'en') {
                    $assocCopyFormEn[$idx]->added[$globKey]->value = $textItem;
                  }
                }
              }
              $assocCopyFormAm[$idx]->added[$globKey]->allAnswers = $value;
            }
          }
        } else {
          foreach ($assocCopyFormAm[$idx]->fields as $globKey => $globalVal) {
            if ($globalVal->type == 'select') {
              if ($key === $globalVal->key) {
                    $lang = $allSelect[$value];
                    if ($globalVal->key == 'transactionType') {
                    $assocCopyFormAm[$idx]->fields[$globKey]->selectedOptionName = $value;
                    $assocCopyFormRu[$idx]->fields[$globKey]->selectedOptionName = $value;
                    $assocCopyFormEn[$idx]->fields[$globKey]->selectedOptionName = $value;
                  }
                  $assocCopyFormAm[$idx]->fields[$globKey]->value = $lang['am'];
                  $assocCopyFormRu[$idx]->fields[$globKey]->value = $lang['ru'];
                  $assocCopyFormEn[$idx]->fields[$globKey]->value = $lang['en'];
              }
            }

            if ($globalVal->type == 'communitySelect') {
              if ($key === $globalVal->key) {
                $lang = $allSelect[$value];
                $assocCopyFormAm[$idx]->fields[$globKey]->communityId = $lang['id'];
                $assocCopyFormAm[$idx]->fields[$globKey]->value = $lang['am'];
                $assocCopyFormRu[$idx]->fields[$globKey]->value = $lang['ru'];
                $assocCopyFormEn[$idx]->fields[$globKey]->value = $lang['en'];
              }

              if (array_key_exists('street', $item)) {
                $editHomeStatus = true;
                $addresses = ConfigAddress::find($item['street']);
                if($addresses){
                  $assocCopyFormAm[$idx]->fields[$globKey]->communityStreet->streetId = $item['street'];
                  $assocCopyFormAm[$idx]->fields[$globKey]->communityStreet->value = $addresses->am;
                  $assocCopyFormRu[$idx]->fields[$globKey]->communityStreet->value = $addresses->ru;
                  $assocCopyFormEn[$idx]->fields[$globKey]->communityStreet->value = $addresses->en;
                } else {
                  $assocCopyFormAm[$idx]->fields[$globKey]->communityStreet->streetId = 0;
                }
              }
            }

            if ($globalVal->type == "text") {
              if ($key === $globalVal->key) {
                $valueCopy = (array) $assocCopyFormAm[$idx]->fields[$globKey]->allAnswers;
                foreach ($value as $indText => $textItem) {
                  if ($indText) {
                    $langKey = strtolower(substr($indText, -2));
                    if ($langKey == 'am') {
                      $assocCopyFormAm[$idx]->fields[$globKey]->value = $textItem;
                    }
                    if ($langKey == 'ru') {
                      $assocCopyFormRu[$idx]->fields[$globKey]->value = $textItem;
                    }
                    if ($langKey == 'en') {
                      $assocCopyFormEn[$idx]->fields[$globKey]->value = $textItem;
                    }
                    $valueCopy[$indText] = $textItem;
                  }
                }
                $assocCopyFormAm[$idx]->fields[$globKey]->allAnswers = $valueCopy;
              }
            }
            if ($globalVal->type == "inputNumber") {
              if ($key === $globalVal->key) {
                $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
              }
            }
            if ($globalVal->type == "inputText") {
              if ($key === $globalVal->key) {
                  $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                  $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                  $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
              }
            }
            if (array_key_exists('juridical', $data)) {
              if (array_key_exists('owner2', $data['juridical'])) {
                $assocCopyFormAm['juridical']->fields[2]->option[0]->value = $data['juridical']['owner2'];
                $assocCopyFormRu['juridical']->fields[2]->option[0]->value = $data['juridical']['owner2'];
                $assocCopyFormEn['juridical']->fields[2]->option[0]->value = $data['juridical']['owner2'];
              }
              if (array_key_exists('ownerTel2', $data['juridical'])) {
                $assocCopyFormAm['juridical']->fields[2]->option[1]->value = $data['juridical']['ownerTel2'];
                $assocCopyFormRu['juridical']->fields[2]->option[1]->value = $data['juridical']['ownerTel2'];
                $assocCopyFormEn['juridical']->fields[2]->option[1]->value = $data['juridical']['ownerTel2'];
              }
              if (array_key_exists('owner3', $data['juridical'])) {
                $assocCopyFormAm['juridical']->fields[2]->option[2]->value = $data['juridical']['owner3'];
                $assocCopyFormRu['juridical']->fields[2]->option[2]->value = $data['juridical']['owner3'];
                $assocCopyFormEn['juridical']->fields[2]->option[2]->value = $data['juridical']['owner3'];
              }
              if (array_key_exists('ownerTel3', $data['juridical'])) {
                $assocCopyFormAm['juridical']->fields[2]->option[3]->value = $data['juridical']['ownerTel3'];
                $assocCopyFormRu['juridical']->fields[2]->option[3]->value = $data['juridical']['ownerTel3'];
                $assocCopyFormEn['juridical']->fields[2]->option[3]->value = $data['juridical']['ownerTel3'];
              }
            }
            if ($globalVal->type == "inputNumberSingle") {
              if ($key === $globalVal->key) {
                if ($assocCopyFormAm[$idx]->name == 'price') {
                  if (!(isset($item["priceNegotiable"]) && $item["priceNegotiable"] != "on")) {
                    $priceHistory = $value;

                    $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                    $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                    $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
                  } else {
                    $assocCopyFormAm[$idx]->fields[$globKey]->value = '';
                    $assocCopyFormRu[$idx]->fields[$globKey]->value = '';
                    $assocCopyFormEn[$idx]->fields[$globKey]->value = '';
                  }
                } else {
                  $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                  $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                  $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
                }
              }
            }
            if ($globalVal->type == "inputNumberSymbol") {
              if ($key === $globalVal->key) {
                if($key === "surface"){
                  $editHomeStatus = true;
                }
                $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
              }
            }
            if ($globalVal->type == "agentSelect" || $globalVal->type == "managerSelect") {
              if ($key === $globalVal->key) {
                $employe = Employe::find($value);
                if($employe){
                  $assocCopyFormAm[$idx]->fields[$globKey]->value = json_decode($employe->full_name)->am;
                  $assocCopyFormRu[$idx]->fields[$globKey]->value = json_decode($employe->full_name)->ru;
                  $assocCopyFormEn[$idx]->fields[$globKey]->value = json_decode($employe->full_name)->en;
                } else {
                  $assocCopyFormAm[$idx]->fields[$globKey]->value = "";
                  $assocCopyFormRu[$idx]->fields[$globKey]->value = "";
                  $assocCopyFormEn[$idx]->fields[$globKey]->value = "";
                }
              }
            }
            if ($globalVal->type == 'multiselect') {
              if ($key === $globalVal->key) {
                $itemsAm = [];
                $itemsRu = [];
                $itemsEn = [];
                foreach ($value as $multiKey => $multiItem) {
                  $lang = $allSelect[$multiItem];
                  $itemsAm[] = $lang['am'];
                  $itemsRu[] = $lang['ru'];
                  $itemsEn[] = $lang['en'];
                }
                $assocCopyFormAm[$idx]->fields[$globKey]->value = implode(", ", $itemsAm);
                $assocCopyFormRu[$idx]->fields[$globKey]->value = implode(", ", $itemsRu);
                $assocCopyFormEn[$idx]->fields[$globKey]->value = implode(", ", $itemsEn);
              }
            }
            if ($globalVal->type == "checkbox") {
              if ($key === $globalVal->key) {
                $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
              }
            }
            if ($globalVal->type == "numSelect") {
              if ($key === $globalVal->key) {
                $assocCopyFormAm[$idx]->fields[$globKey]->value = $value;
                $assocCopyFormRu[$idx]->fields[$globKey]->value = $value;
                $assocCopyFormEn[$idx]->fields[$globKey]->value = $value;
              }
            }
          }
        }
      }
    }
    $normalArrayAm = array_values($assocCopyFormAm);
    $normalArrayRu = array_values($assocCopyFormRu);
    $normalArrayEn = array_values($assocCopyFormEn);
    return ['am' => $normalArrayAm, 'ru' => $normalArrayRu, 'en' => $normalArrayEn,  'editStatus' => $editHomeStatus, 'priceHistory' => $priceHistory];
  }

}