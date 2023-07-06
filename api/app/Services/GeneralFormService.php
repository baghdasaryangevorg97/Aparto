<?php
namespace App\Services;
use App\Models\GlobalForm;


class GeneralFormService
{
    public function getFormStructure()
    {
        // $formStructure = [];
        // $getForm = GlobalForm::findOrFail(1);
        // $phpData = json_decode($getForm['am'], true);
        // foreach ($formStructure as $key => $value) {
        //     if(isset($phpData[$key])){
        //         foreach ($phpData[$key] as $idx => $addVal) {
        //             array_push($value, $addVal);
        //         }
        //         $formStructure[$key] = $value;
        //     }
        // }
        // return $formStructure;
    }

    public function addGeneralField($data) {

        $form = GlobalForm::findorFail(1);
        $form->am = json_decode($form->am);
        $form->ru = json_decode($form->ru);
        $form->en = json_decode($form->en);
        
        foreach ($form->am as $index => $value) {
          if((string) $value->name == $data['am']['name']){
            if(isset($value->added)){
              $value->added[] = [
                'key' => $data['am']['key'],
                "title" => $data['am']['title'],
                "value" => '',
                "type" => "text",
                "allAnswers" => [],
                "style" => '629px'
              ];
            }
          }
        }
        foreach ($form->ru as $index => $value) {
          if((string) $value->name == $data['ru']['name']){
            if(isset($value->added)){
              $value->added[] = [
                'key' => $data['ru']['key'],
                "title" => $data['ru']['title'],
                "value" => '',
                "type" => "text",
                "style" => '629px'
              ];
            }
          }
        }
        foreach ($form->en as $index => $value) {
          if((string) $value->name == $data['en']['name']){
            if(isset($value->added)){
              $value->added[] = [
                'key' => $data['en']['key'],
                "title" => $data['en']['title'],
                "value" => '',
                "type" => "text",
                "style" => '629px'
              ];
            }
          }
        }

        GlobalForm::findorFail(1)->update(['am'=> json_encode($form->am), 'ru'=> json_encode($form->ru), 'en'=> json_encode($form->en)]);
        return true;
    }

    public function removeGeneralField ($data) {
        $form = GlobalForm::findorFail(1);
        $form->am = json_decode($form->am);
        $form->ru = json_decode($form->ru);
        $form->en = json_decode($form->en);
        $key = current(array_keys($data));

        if($form->am){
            foreach ($form->am as $key => $value) {
                if($data['am']['name'] == $value->name){
                  if(isset($value->added)){
                    foreach ($value->added as $idx => $field) {
                      if($field->key == $data['am']['id']){
                        unset($value->added[$idx]);
                        $value->added = array_values($value->added);
                      }
                    }
                  }
                }
            };
        }
        if($form->ru){
          foreach ($form->ru as $key => $value) {
              if($data['ru']['name'] == $value->name){
                if(isset($value->added)){
                  foreach ($value->added as $idx => $field) {
                    if($field->key == $data['ru']['id']){
                      unset($value->added[$idx]);
                      $value->added = array_values($value->added);
                    }
                  }
                }
              }
          };
      }
      if($form->en){
        foreach ($form->en as $key => $value) {
            if($data['en']['name'] == $value->name){
              if(isset($value->added)){
                foreach ($value->added as $idx => $field) {
                  if($field->key == $data['en']['id']){
                    unset($value->added[$idx]);
                    $value->added = array_values($value->added);
                  }
                }
              }
            }
        };
    }
          GlobalForm::findorFail(1)->update(['am'=> json_encode($form->am), 'ru'=> json_encode($form->ru), 'en'=> json_encode($form->en)]);
    }
}