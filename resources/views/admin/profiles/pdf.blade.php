<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @font-face {
            font-family: "kalpurush";
            font-style: normal;
            font-weight: normal;
            src: url(kalpurush.ttf) format('truetype');
        }

        * {
            margin: 2px !important;
            padding: 0 !important;
            font-family: "kalpurush";
        }

        td {
            font-size: 16px;
        }

        .container {
            max-width: 90%;
            margin-left: auto !important;
            margin-right: auto !important;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- head  start-->
        <table style=" width: 100%; padding: 20px;">
            <tr style=" padding: 20px;">
                <td>
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 33%">
                                <img src="{{ public_path('ui/frontend-ui/assets/img/nub.png')?? '' }}"alt="Logo"
                                    width="80px">
                                {{-- <p>Name: {{ucfirst(strtoupper(trans($profile[0]->full_name))) }}</p> --}}
                                <p>Name: {{ strtoupper($profile[0]->full_name) }}</p>
                                {{-- <p>Name: {{ $profile[0]->full_name }}</p> --}}
                                <p>Membership No:{{ $profile[0]->membership_no }}</p>
                                <p>Bank id : {{ $profile[0]->membership_no }}</p>
                            </td>
                            <td style="width: 34%; text-align: center;">
                                <h2>Pathikrit</h2>
                                <p>Dhaka</p>
                                <p>Member information</p>
                            </td>
                            {{-- @dd($profile[0]->profile_pic) --}}

                            <td style="width: 33%; text-align: right ;align-self: flex-end;">
                                <img src="{{ public_path('storage/profile/' . Auth::user()->profile->profile_pic)?? '' }}"alt="User profile picture"
                                width="128px" height="156px">

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!-- head close -->




        <!-- body start -->
        <table style="width: 100%;">



            <!-- personal head start -->
            <tr style="background-color:  rgb(164 164 164 / 25%);">
                <td style="text-align: center; width: 100%; height:35px;">
                    <h3>Personal Information</h3>
                </td>
            </tr>
            <!-- personal head close -->



            <!-- personal body start -->
            <tr>
                <td>
                    <table style="padding:30px ; width: 100%;">

                        {{-- <tr>
                            <td style="width:25% ;">
                                <p>Bangla Name</p>
                            </td>
                            <td style="width:5% ;">:</td>
                            <td style="width:70% ;">{{ $profile[0]->full_name }}</td>
                        </tr> --}}
                        <tr>
                            <td style="width:25% ;">
                                <p>Fathers Name </p>
                            </td>
                            <td style="width:5% ;">:</td>
                            <td style="width:70% ;">{{ $profile[0]->father_name }}</td>
                        </tr>
                        <tr>
                            <td>
                                <p>Mothers Name</p>
                            </td>
                            <td>:</td>
                            <td>{{ $profile[0]->mother_name }}</td>
                        </tr>
                        <tr>
                            <td>
                                <p>Designation</p>
                            </td>
                            <td>:</td>
                            <td>{{ $profile[0]->designation }}</td>
                        </tr>
                        <tr>
                            <td>
                                <p>Date of Birth </p>
                            </td>
                            <td>:</td>
                            <td>{{ $profile[0]->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <td>
                                <p>Sex</p>
                            </td>
                            <td>:</td>
                            <td>{{ $profile[0]->gender }}</td>
                        </tr>
                        <tr>
                            <td>
                                <p>Blood Group</p>
                            </td>
                            <td>:</td>
                            <td>{{ $profile[0]->blood_group }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- personal body close -->



            <!-- Education Information head start -->
            <tr style="background-color:  rgb(164 164 164 / 25%);">
                <td style="text-align: center; width: 100%; height:35px;">
                    <h3>Education Information</h3>
                </td>
            </tr>
            <!-- Education Information head close -->



            <!-- Education Information body start -->
            <tr>
                <td>
                    <table style="padding:30px ; width: 100%;">

                        <tr>
                            <td style="width: 25%;">
                                <p>Graduate Form</p>
                            </td>
                            <td style="width: 5%;">:</td>
                            <td style="width:70% ;">Northern University Bangladesh</td>
                        </tr>
                        {{-- <tr>
                            <td>
                                <p>Post Graduate Form</p>
                            </td>
                            <td>:</td>
                            <td>{{ $profile[0]->academic_postgraduate_from }}</td>
                        </tr> --}}

                    </table>
                </td>
            </tr>
            <!-- Education Information body close -->


            <!-- Contact Information head start -->
            <tr style="background-color:  rgb(164 164 164 / 25%);">
                <td style="text-align: center; width: 100%; height:35px;">
                    <h3>Contact Information</h3>
                </td>
            </tr>
            <!-- Contact Information head close -->



            <!-- Contact Information body start -->
            <tr>
                <td>
                    <table style="padding:30px ; width: 100%;">

                        <tr>
                            <td style="width: 25%;">
                                <p>Present Address</p>
                            </td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 70% ;">
                                {{ $profile[0]->present_address }},{{ $profile[0]->present_add_ps }},{{ $profile[0]->present_district }},{{ $profile[0]->present_add_zip }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Permanent Address</p>
                            </td>
                            <td>:</td>
                            <td> {{ $profile[0]->permanent_address }},{{ $profile[0]->permanent_add_ps }},{{ $profile[0]->permanent_district }},{{ $profile[0]->permanent_add_zip }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Mobile</p>
                            </td>
                            <td>:</td>
                            <td>{{ $profile[0]->mobile_no }}</td>

                        </tr>
                        <tr>
                            <td>
                                <p>Email Address</p>
                            </td>
                            <td>:</td>
                            <td>{{ $user[0]->email }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- Contact Information body close -->


            <!-- Profession Information head start -->
            <tr style="background-color:  rgb(164 164 164 / 25%);">
                <td style="text-align: center; width: 100%; height:35px;">
                    <h3>Profession Information</h3>
                </td>
            </tr>
            <!-- Profession Information head close -->


            <!-- Profession Information body start -->
            <tr>
                <td>
                    <table style="padding:30px ; width: 100%;">

                        <tr>
                            <td style="width: 25%;">
                                <p>Designation</p>
                            </td>
                            <td style="width: 5%;">:</td>
                            <td style="width:70% ;">{{ $profile[0]->designation }}</td>
                        </tr>
                        <tr>
                            <td>
                                <p>Place of Joining</p>
                            </td>
                            <td>:</td>
                            <td>{{ $profile[0]->designation }}</td>
                        </tr>
                        {{-- <tr>
                            <td>
                                <p>Place of Posting</p>
                            </td>
                            <td>:</td>
                            <td>Recovery Department-1(RD-1).Head Office</td>
                        </tr> --}}

                    </table>
                </td>
            </tr>
            <!-- Profession Information body close -->



            <!-- Nominee Information head start -->
            <tr style="background-color:  rgb(164 164 164 / 25%);">
                <td style="text-align: center; width: 100%; height:35px;">
                    <h3>Nominee Information</h3>
                </td>
            </tr>
            <!-- Nominee Information head close -->



            <!-- Nominee Information body start-->
            <tr>
                <td>
                    <table style="padding:30px ; width: 100%;">

                        <tr>
                            <td style="width: 25%;">
                                <p>Nominee Name</p>
                            </td>
                            <td style="width: 5%;">:</td>
                            <td style="width:50% ;">{{ $nominee->name }}</td>
                            <td rowspan="5" style="text-align:right ;">
                                <img src="{{ public_path('storage/nominee/' . $nominee->nominee_picture)?? '' }}"alt="Nomminee picture"
                                width="128px" height="156px">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Nominee Father's Name</p>
                            </td>
                            <td>:</td>
                            <td>{{ $nominee->fathers_name }}</td>
                        </tr>
                        <tr>
                            <td>
                                <p> Nominee Mother's Name</p>
                            </td>
                            <td>:</td>
                            <td>{{ $nominee->mothers_name }}</td>
                        </tr>

                        <tr>
                            <td>
                                <p> Present Address</p>
                            </td>
                            <td>:</td>
                            <td>{{ $nominee->present_address }}</td>
                        </tr>
                        <tr>
                            <td>
                                <p> Permanent Address</p>
                            </td>
                            <td>:</td>
                            <td>{{ $nominee->permanent_address }}</td>
                        </tr>
                        <tr>
                            <td>
                                <p>Percentage </p>
                            </td>
                            <td>:</td>
                            <td>{{ $nominee->percentage }}</td>
                        </tr>
                        <tr>
                            <td>
                                <p>Relation </p>
                            </td>
                            <td>:</td>
                            <td>{{ $nominee->relation }}</td>
                        </tr>

                        <tr>
                            <td>
                                <p>Last Updated</p>
                            </td>
                            <td>:</td>
                            <td>{{ $nominee->updated_at }}</td>

                        </tr>

                    </table>
                </td>
            </tr>
            <!-- Nominee Information body close-->

        </table>
        <!-- body close -->
    </div>

</body>

</html>
