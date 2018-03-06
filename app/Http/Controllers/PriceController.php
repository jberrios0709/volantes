<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Measure;

class PriceController extends Controller
{
    //
    public function index(){
        $first=Measure::find(1);
        $second=Measure::find(2);
        $three=Measure::find(3);
        $four=Measure::Find(4);
        return response()->json(["data"=>[
                                    "garnet115"=>[
                                        "first"=>[
                                            "oneWeek"=>$first->prices()->where('time','=',1)->where('garnet','=','115gr')->orderBy('id','desc')->get(),
                                            "threeWeek"=>$first->prices()->where('time','=',2)->where('garnet','=','115gr')->orderBy('id','desc')->get()
                                        ],
                                        "second"=>[
                                            "oneWeek"=>$second->prices()->where('time','=',1)->where('garnet','=','115gr')->orderBy('id','desc')->get(),
                                            "threeWeek"=>$second->prices()->where('time','=',2)->where('garnet','=','115gr')->orderBy('id','desc')->get()
                                        ],
                                        "three"=>[
                                            "oneWeek"=>$three->prices()->where('time','=',1)->where('garnet','=','115gr')->orderBy('id','desc')->get(),
                                            "threeWeek"=>$three->prices()->where('time','=',2)->where('garnet','=','115gr')->orderBy('id','desc')->get()
                                        ],
                                        "four"=>[
                                            "oneWeek"=>$four->prices()->where('time','=',1)->where('garnet','=','115gr')->orderBy('id','desc')->get(),
                                            "threeWeek"=>$four->prices()->where('time','=',2)->where('garnet','=','115gr')->orderBy('id','desc')->get()
                                        ]
                                    ],
                                    "garnet150"=>[
                                        "first"=>[
                                            "oneWeek"=>$first->prices()->where('time','=',1)->where('garnet','=','150gr')->orderBy('id','desc')->get(),
                                            "threeWeek"=>$first->prices()->where('time','=',2)->where('garnet','=','150gr')->orderBy('id','desc')->get()
                                        ],
                                        "second"=>[
                                            "oneWeek"=>$second->prices()->where('time','=',1)->where('garnet','=','150gr')->orderBy('id','desc')->get(),
                                            "threeWeek"=>$second->prices()->where('time','=',2)->where('garnet','=','150gr')->orderBy('id','desc')->get()
                                        ],
                                        "three"=>[
                                            "oneWeek"=>$three->prices()->where('time','=',1)->where('garnet','=','150gr')->orderBy('id','desc')->get(),
                                            "threeWeek"=>$three->prices()->where('time','=',2)->where('garnet','=','150gr')->orderBy('id','desc')->get()
                                        ],
                                        "four"=>[
                                            "oneWeek"=>$four->prices()->where('time','=',1)->where('garnet','=','150gr')->orderBy('id','desc')->get(),
                                            "threeWeek"=>$four->prices()->where('time','=',2)->where('garnet','=','150gr')->orderBy('id','desc')->get()
                                        ]
                                    ]
                                    
                                ]],200);
    }
}
