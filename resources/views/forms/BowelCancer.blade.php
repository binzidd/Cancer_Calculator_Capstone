@extends('layouts.app')

@yield('title')
<title>Bowel Cancer Detection</title>

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <form action="{{route ('bowel_onpost')}}" method="post">

                    <div class="form-control">Find out your risk</div>
                    <br>

                    <input type="hidden" name="default_values_set" value="{{$default_array}}"/>

                    <div class="form-group col-md-offset-1 ">
                        <label class="form-group" style=background-color:#ffe5d7;">
                            <div class="blockmargins">


                                <h3>Have any of your relatives*
                                    been told they have a genetic condition associated with bowel cancer?</h3>
                                <p>Please note: Refers to relatives whether they have ever had bowel cancer or not.</p>

                                <li>Lynch Syndrome (also known as Hereditary Non Polyposis Colorectal Cancer Syndrome or
                                    HNPCC)
                                </li>
                                <li>Familial Adenomatious Polyposis (FAP)</li>
                                <li>MYH - Associated Polyposis</li>
                                <li>Having more than 100 polyps in their large bowel</li>
                                </ul>
                                <br>
                                <strong>* Relatives to consider:</strong></p>

                                <ul class="naked-list">
                                    <li>Your full or half sisters/brothers</li>
                                    <li>Your children</li>
                                    <li>Your parents</li>
                                    <li>Your aunts/uncles</li>
                                    <li>Your nieces/nephews</li>
                                    <li>Your grandparents</li>
                                </ul>

                                <div class="form-group form-group-nonfam form-group-radio">
                                    <fieldset class="radio ">
                                        <label><input type="radio" name="assoc" value="yes">
                                            <span>Yes, a genetic condition has been recognised within the family</span></label>
                                        <label><input type="radio" name="assoc" value="no">
                                            <span>No genetic condition within the family is known</span></label>
                                    </fieldset>
                                </div>
                            </div>
                        </label>
                    </div>

                    <div class="form-group col-md-offset-1 blockmargins">
                        <label class="form-group col-md-offset-1 ">
                            <h2> Have any of the following relatives been diagnosed with bowel cancer? </h2>
                            <div class="form-check" style=background-color:#ffe5d7;">
                                <label class="form-check-label blockmargins ">
                                    <h2>Your mother's side of the family</h2>

                                    <div class="relselectenv  ">
                                        <strong> Your mother </strong>
                                        <label class="select">
                                            <select name="crc_ms_parent" class="form-control">
                                                <option value="0" selected="selected">no</option>
                                                <option value="1">yes</option>
                                            </select>
                                        </label>
                                    </div>

                                    <div class="relselectenv  ">
                                        <strong> Your half sisters and half brothers (same mother as you) </strong>
                                        <label class="select">
                                            <select name="crc_ms_halfsib" class="form-control">
                                                <option value="0" selected="selected">none</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3 or more</option>
                                            </select>
                                        </label>
                                    </div>

                                    <div class="relselectenv  ">
                                        <strong>Your aunts and uncles (mother's siblings)</strong>
                                        <label class="select">
                                            <select name="crc_ms_parsib" class="form-control">
                                                <option value="0" selected="selected">none</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3 or more</option>
                                            </select>
                                        </label>
                                    </div>

                                    <div class="relselectenv  ">
                                        <strong> Your grandparents (mother's parents)</strong>
                                        <label class="select">
                                            <select name="crc_ms_gpar" class="form-control">
                                                <option value="0" selected="selected">neither</option>
                                                <option value="1">1</option>
                                                <option value="2">both</option>
                                            </select>
                                        </label>
                                    </div>
                                </label>
                            </div>

                            <div class="form-check " style="background-color:#D8FFD8;">
                                <label class="form-check-label blockmargins">
                                    <h2>Your <strong>father's</strong> side of the family</h2>
                                    <div class="relselectenv  ">
                                        <strong>Your father</strong>
                                        <label class="select">
                                            <select name="crc_fs_parent" class="form-control">
                                                <option value="0" selected="selected">no</option>
                                                <option value="1">yes</option>
                                            </select>
                                        </label>
                                    </div>

                                    <div class="relselectenv  ">
                                        Your half sisters and half brothers (same father as you)
                                        <label class="select">
                                            <select name="crc_fs_halfsib" class="form-control">
                                                <option value="0" selected="selected">none</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3 or more</option>
                                            </select>
                                        </label>
                                    </div>

                                    <div class="relselectenv  ">
                                        Your aunts and uncles (father's siblings)
                                        <label class="select">
                                            <select name="crc_fs_parsib" class="form-control">
                                                <option value="0" selected="selected">none</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3 or more</option>
                                            </select>
                                        </label>
                                    </div>

                                    <div class="relselectenv  ">
                                        Your grandparents (father's parents)
                                        <label class="select">
                                            <select name="crc_fs_gpar" class="form-control">
                                                <option value="0" selected="selected">neither</option>
                                                <option value="1">1</option>
                                                <option value="2">both</option>
                                            </select>
                                        </label>
                                    </div>
                                </label>
                            </div>

                            <div class="form-check " style="background-color:#E2EFFF;">
                                <label class="form-check-label blockmargins">
                                    <div class="rel-env formgrp_famside_bs">
                                        <h2>Your generation and children</h2>
                                        <div class="relselectenv  ">
                                            <strong>Your sisters and brothers</strong>
                                            <label class="select">
                                                <select name="crc_bs_sibling" class="form-control">
                                                    <option value="0" selected="selected">none</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3 or more</option>
                                                </select>
                                            </label>

                                        </div>
                                        <div class="relselectenv  ">
                                            <strong>Your daughters and sons</strong>
                                            <label class="select">
                                                <select name="crc_bs_children" class="form-control">
                                                    <option value="0" selected="selected">none</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3 or more</option>
                                                </select>
                                            </label>

                                        </div>
                                        <div class="relselectenv  ">
                                            <strong> Your nieces and nephews
                                            </strong>
                                            <label class="select">
                                                <select name="crc_bs_nieneph" class="form-control">
                                                    <option value="0" selected="selected">none</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3 or more</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <input class="col-md-offset-4" type="submit" name="submit" value="submit">
                            <input type="hidden" name="_token" value="{{Session::token()}} ">
                        </label>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection