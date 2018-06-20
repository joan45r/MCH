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
    }

    public function unusual()
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
        $i = 0; $j = 0; $l = 0;
        
        foreach($ingrds->dataset as $ingrd) 
            // dd((string)$ingrd->datasetInfo->datasetDescription);
            {
            if ((string)$ingrd->datasetInfo->datasetDescription!="") {
                $ingrds_data[$i]['description'] = (string)$ingrd->datasetInfo->datasetDescription;
                $ingrds_data[$i]['issueTime'] = substr((string)$ingrd->datasetInfo->issueTime, 0, 10)."　".substr((string)$ingrd->datasetInfo->issueTime, 11, 8);
                $ingrds_data[$i]['sTime'] = substr((string)$ingrd->datasetInfo->validTime->startTime, 0, 10)."　".substr((string)$ingrd->datasetInfo->validTime->startTime, 11 ,8);
                $ingrds_data[$i]['eTime'] = substr((string)$ingrd->datasetInfo->validTime->endTime, 0 ,10)."　".substr((string)$ingrd->datasetInfo->validTime->endTime, 11, 8);
                $ingrds_data[$i]['content'] = (string)$ingrd->contents->content->contentText;
                
                foreach($ingrd->hazardConditions->hazards->hazard as $infos) 
                {
                    if ((string)$infos->info->phenomena!="") {  
                                          
                        $ingrds_data[$i]['phenomenas'][$j]['phenomena'] = (string)$infos->info->phenomena;
                        foreach($infos->info->affectedAreas->location as $infos2)
                        {
                            if((string)$infos2->locationName!=""){
                                $ingrds_data[$i]['phenomenas'][$j]['affectedAreas'][$l] = (string)$infos2->locationName;
                                $l++;
                            }
                        }
                        $l=0;
                        $j++;
                    }
                }
                $i++;
                // dd($ingrds_data);
            }
        }
        $focus['ingrds'] = $ingrds_data;
        // dd($focus);
        return View::make('unusual',['focus' => $focus]);
        
    }

    public function forecast()
    {
        $focus = array();
        $focus['m'] = '';
        $focus['c'] = '';
        $focus['h'] = 'active';
        
        $focus['first']='0';

        $area="";

        if (isset($_GET['uvi_area'])) {
            $area = $_GET['uvi_area'];
            $focus['first']='1';
        }

        // 天氣預報資料
        $xml = XmlParser::load('http://opendata.cwb.gov.tw/govdownload?dataid=F-C0032-001&authorizationkey=rdec-key-123-45678-011121314');
        $ingrds = $xml->getContent();
        // dd($ingrds);
        $ingrds_data = array();
        $i = 0; $j = 0; $l = 0; $t = 0;
        
        if($area!=""){
            foreach($ingrds->dataset as $ingrd) 
            // dd((string)$ingrd->datasetInfo->datasetDescription);
            {
                if ((string)$ingrd->datasetInfo->issueTime!="") {
                    $ingrds_data[$i]['issueTime'] = (string)$ingrd->datasetInfo->issueTime;
                    $ingrds_data[$i]['update'] = (string)$ingrd->datasetInfo->update;
                    $ingrds_data[$i]['update'] = substr((string)$ingrd->datasetInfo->update, 0, 4)."/".substr((string)$ingrd->datasetInfo->update, 5, 2)."/".substr((string)$ingrd->datasetInfo->update, 8, 2)." ".substr((string)$ingrd->datasetInfo->update, 11, 5);;
                    foreach($ingrd->location as $infos) 
                    {
                        if ((string)$infos->locationName!="" && preg_match('/'.$area.'/i', (string)$infos->locationName)) {
                            $ingrds_data[$i]['location'][$j]['locationName'] = (string)$infos->locationName;
                            foreach($infos->weatherElement as $infos2)
                            {
                                if((string)$infos2->elementName!=""){
                                    $ingrds_data[$i]['location'][$j]['weatherElement'][$l]['elementName'] = (string)$infos2->elementName;
                                    foreach($infos2->time as $infos3)
                                    {
                                        if((string)$infos3->startTime!=""){
                                            $ingrds_data[$i]['location'][$j]['weatherElement'][$l]['time'][$t]['startTime'] = substr((string)$infos3->startTime, 5, 2)."/".substr((string)$infos3->startTime, 8, 2)." ".substr((string)$infos3->startTime, 11, 5);
                                            $ingrds_data[$i]['location'][$j]['weatherElement'][$l]['time'][$t]['endTime'] = substr((string)$infos3->endTime, 5, 2)."/".substr((string)$infos3->startTime, 8, 2)." ".substr((string)$infos3->endTime, 11, 5);
                                            foreach($infos3->parameter as $infos4)
                                            {
                                                if((string)$infos4->parameterName!=""){
                                                    $ingrds_data[$i]['location'][$j]['weatherElement'][$l]['time'][$t]['parameter'] = (string)$infos4->parameterName;
                                                }
                                            }
                                            $t++;
                                        }
                                    }
                                    $l++;
                                }
                            }
                            
                            $l=0;
                            $j++;
                        }
                    }
                    $i++;
                    // dd($ingrds_data);
                }
            }
        } else {
            foreach($ingrds->dataset as $ingrd) 
            // dd((string)$ingrd->datasetInfo->datasetDescription);
            {
                if ((string)$ingrd->datasetInfo->issueTime!="") {
                    $ingrds_data[$i]['issueTime'] = (string)$ingrd->datasetInfo->issueTime;
                    $ingrds_data[$i]['update'] = (string)$ingrd->datasetInfo->update;
                    
                    foreach($ingrd->location as $infos) 
                    {
                        if ((string)$infos->locationName!="") {
                            $ingrds_data[$i]['location'][$j]['locationName'] = (string)$infos->locationName;
                            foreach($infos->weatherElement as $infos2)
                            {
                                if((string)$infos2->elementName!=""){
                                    $ingrds_data[$i]['location'][$j]['weatherElement'][$l]['elementName'] = (string)$infos2->elementName;
                                    foreach($infos2->time as $infos3)
                                    {
                                        if((string)$infos3->startTime!=""){
                                            $ingrds_data[$i]['location'][$j]['weatherElement'][$l]['time'][$t]['startTime'] = (string)$infos3->startTime;
                                            $ingrds_data[$i]['location'][$j]['weatherElement'][$l]['time'][$t]['endTime'] = (string)$infos3->endTime;
                                            foreach($infos3->parameter as $infos4)
                                            {
                                                if((string)$infos4->parameterName!=""){
                                                    $ingrds_data[$i]['location'][$j]['weatherElement'][$l]['time'][$t]['parameter'] = (string)$infos4->parameterName;
                                                }
                                            }
                                            $t++;
                                        }
                                    }
                                    $t=0;
                                    $l++;
                                }
                            }
                            $l=0;
                            $j++;
                        }
                    }
                    $i++;
                    // dd($ingrds_data);
                }
            }
        }
        
        $focus['ingrds'] = $ingrds_data;
        // dd($focus);

        // return View('forecast');
        return View::make('forecast',['focus' => $focus]);
    }
}
