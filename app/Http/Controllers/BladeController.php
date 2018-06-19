<?php

namespace App\Http\Controllers;

use View;

use Illuminate\Http\Request;

use XmlParser;

class BladeController extends Controller
{
    public function index()
    {
        $focus = array();
        $focus['m'] = '';
        $focus['c'] = '';
        $focus['h'] = '';
        
        // return View('index');
        return View::make('index',['focus' => $focus]);        
    }

    public function uvi()
    {
        $focus = array();
        $focus['m'] = 'active';
        $focus['c'] = '';
        $focus['h'] = '';

        $focus['first']='0';

        $area="";

        if (isset($_GET['uvi_area'])) {
            $area = $_GET['uvi_area'];
            $focus['first']='1';
        }

        $xml = XmlParser::load('http://opendata2.epa.gov.tw/UV/UV.xml');
        $ingrds = $xml->getContent();
        // dd($ingrds);
        $ingrds_data = array();
        $i = 0;
        if ($area!=""){
            foreach($ingrds as $ingrd) 
                // dd((string)$ingrd->County);
                {
                if ((string)$ingrd->County!="" && preg_match('/'.$area.'/i', (string)$ingrd->County) || preg_match('/'.$area.'/i', (string)$ingrd->SiteName)) {
                    $ingrds_data[$i]['county'] = (string)$ingrd->County;
                    $ingrds_data[$i]['agency'] = (string)$ingrd->PublishAgency;
                    $ingrds_data[$i]['site'] = (string)$ingrd->SiteName;
                    $ingrds_data[$i]['time'] = (string)$ingrd->PublishTime;
                    $ingrds_data[$i]['uv'] = (string)$ingrd->UVI;
                    $ingrds_data[$i]['lat'] = (string)$ingrd->WGS84Lat;
                    $ingrds_data[$i]['lon'] = (string)$ingrd->WGS84Lon;

                    $i++;
                    // dd($ingrds_data);
                }
            }
        } else {
            foreach($ingrds as $ingrd)
                {
                if ($ingrd['county']!="") {
                    $ingrds_data[$i]['county'] = (string)$ingrd->County;
                    $ingrds_data[$i]['agency'] = (string)$ingrd->PublishAgency;
                    $ingrds_data[$i]['site'] = (string)$ingrd->SiteName;
                    $ingrds_data[$i]['time'] = (string)$ingrd->PublishTime;
                    $ingrds_data[$i]['uv'] = (string)$ingrd->UVI;
                    $ingrds_data[$i]['lat'] = (string)$ingrd->WGS84Lat;
                    $ingrds_data[$i]['lon'] = (string)$ingrd->WGS84Lon;

                    $i++;
                }
            }
        }

        $focus['ingrds'] = $ingrds_data;
        // dd($focus);
        return View::make('uvi', ['focus' => $focus]);
        
        

        // $med = $xml->parse([
        //     '中文品名' => ['uses' => 'med.cName'],
        //     '英文品名' => ['uses' => 'med.eName'],
        //     '適應症' => ['uses' => 'med.indication'],
        //     '劑型' => ['uses' => 'med.dosage'],
        //     '包裝' => ['uses' => 'med.pack'],
        //     '藥品類別' => ['uses' => 'med.mType'],
        //     '主成分略述' => ['uses' => 'med.mainIngrd'],
        //     '許可證字號' => ['uses' => 'med.license'],
        //     '有效日期' => ['uses' => 'med.vDate'],
        //     '發證日期' => ['uses' => 'med.eDate'],
        //     '製造商名稱' => ['uses' => 'med.mfName'],
        //     '製造廠國別' => ['uses' => 'med.mfCountry'],
        // ]);
        

        // return View('medicine');
    }

    public function cosmetic()
    {
        $focus = array();
        $focus['m'] = '';
        $focus['c'] = 'active';
        $focus['h'] = '';

        // https://data.gov.tw/dataset/9245 災害性天氣特報資料
        $xml = XmlParser::load('http://opendata.cwb.gov.tw/govdownload?dataid=W-C0033-002&authorizationkey=rdec-key-123-45678-011121314');
        $ingrds = $xml->getContent();
        // dd($ingrds);
        $ingrds_data = array();
        $i = 0;
        foreach($ingrds->dataset as $ingrd) 
            // dd((string)$ingrd->datasetInfo->datasetDescription);
            {
            if ((string)$ingrd->datasetInfo->datasetDescription!="") {
                $ingrds_data[$i]['description'] = (string)$ingrd->datasetInfo->datasetDescription;
                $ingrds_data[$i]['issueTime'] = (string)$ingrd->datasetInfo->issueTime;
                $ingrds_data[$i]['sTime'] = (string)$ingrd->datasetInfo->validTime->startTime;
                $ingrds_data[$i]['eTime'] = (string)$ingrd->datasetInfo->validTime->endTime;
                $ingrds_data[$i]['content'] = (string)$ingrd->contents->content->contentText;

                $i++;
                // dd($ingrds_data);
            }
        }
        $focus['ingrds'] = $ingrds_data;
        // dd($focus);
        // return View('cosmetic');
        return View::make('cosmetic',['focus' => $focus]);
    }

    public function health()
    {
        $focus = array();
        $focus['m'] = '';
        $focus['c'] = '';
        $focus['h'] = 'active';       
        // return View('health');
        return View::make('health',['focus' => $focus]);
    }
}
