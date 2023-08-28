<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('ui/admin-ui/assets') }}/img/apple-icon.png">

    <link rel="icon" type="image/png" href="{{ asset('ui/frontend-ui/assets') }}/img/nub.png">
    <title>NUB-Admin-20102011</title>
    <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />

    <meta name="keywords"
        content="creative tim, html dashboard, html css
      dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3
      dashboard, bootstrap 5 admin, material dashboard bootstrap 5
      dashboard, frontend, responsive bootstrap 5 dashboard, material
      design, material dashboard bootstrap 5 dashboard">
    <meta name="description"
        content="Material Dashboard PRO is a beautiful
      Bootstrap 5 admin dashboard with a large number of components,
      designed to look beautiful, clean and organized. If you are looking
      for a tool to manage dates about your business, this dashboard is
      the thing for you.">

    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative
      Tim">
    <meta name="twitter:description"
        content="Material Dashboard PRO is a
      beautiful Bootstrap 5 admin dashboard with a large number of
      components, designed to look beautiful, clean and organized. If you
      are looking for a tool to manage dates about your business, this
      dashboard is the thing for you.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_bs5_thumbnail.jpg">
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative
      Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url"
        content="https://demos.creative-tim.com/material-dashboard-pro/pages/dashboards/default.html" />
    <meta property="og:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_bs5_thumbnail.jpg" />
    <meta property="og:description"
        content="Material Dashboard PRO is a
      beautiful Bootstrap 5 admin dashboard with a large number of
      components, designed to look beautiful, clean and organized. If you
      are looking for a tool to manage dates about your business, this
      dashboard is the thing for you." />
    <meta property="og:site_name" content="Creative Tim" />

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" />

    <link href="{{ asset('ui/admin-ui/assets') }}/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('ui/admin-ui/assets') }}/css/nucleo-svg.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('ui/admin-ui/assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('ui/admin-ui/assets') }}/css/dataTables.bootstrap5.min.css">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="{{ asset('ui/admin-ui/assets') }}/css/material-dashboard.css" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('ui/admin-ui/assets') }}/css/material-dashboard.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link id="pagestyle" href="{{ asset('ui/admin-ui/assets') }}/css/material-dashboard.min.css?v=3.0.6"
        rel="stylesheet" />

    <style>
        .async-hide {
            opacity: 0 !important
        }

        span.badge.bg-danger.position-absolute.rounded-pill.translate-middle {
            top: 170px !important;
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-200">

    <x-admin.layouts.partials.aside />

    <main class="main-content position-relative max-height-vh-100 h-100
        border-radius-lg ">
        <!-- Navbar -->
        <x-admin.layouts.partials.nav />

        <!-- End Navbar -->
        <section class="content">
            <div class="container-fluid py-4">
                <div class="row mb-4 mt-4">
                    {{ $slot }}
                </div>
            </div>
        </section>
        <x-admin.layouts.partials.footer />
    </main>

    <!--   Core JS Files   -->
    <script src="{{ asset('ui/admin-ui/assets') }}/js/choices.min.js"></script>
    <script src="{{ asset('ui/admin-ui/assets') }}/js/quill.min.js"></script>
    <script src="{{ asset('ui/admin-ui/assets') }}/js/flatpickr.min.js"></script>
    <script src="{{ asset('ui/admin-ui/assets') }}/js/dropzone.min.js"></script>
    <script src="{{ asset('ui/admin-ui/assets') }}/js/multistep-form.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>


    {{-- JS for Profile Edit Start --}}
    <script>
        if (document.getElementById('choices-state')) {
            var element = document.getElementById('choices-state');
            const example = new Choices(element, {
                searchEnabled: false
            });
        };
        if (document.getElementById('faculty')) {
            var element = document.getElementById('faculty');
            const example = new Choices(element, {
                searchEnabled: false
            });
        };
        if (document.getElementById('choices-office-district')) {
            var office_district = document.getElementById('choices-office-district');
            setTimeout(function() {
                const example = new Choices(office_district);
                searchEnabled: false
            });

            var districtArray = new Array();
            districtArray[0] = "Barguna";
            districtArray[1] = "Barisal";
            districtArray[2] = "Bhola";
            districtArray[3] = "Jhalokati";
            districtArray[4] = "Patuakhali";
            districtArray[5] = "Pirojpur";
            districtArray[6] = "Bandarban";
            districtArray[7] = "Brahmanbaria";
            districtArray[8] = "Chandpur";
            districtArray[9] = "Chittagong";
            districtArray[10] = "Comilla";
            districtArray[11] = "Cox's Bazar";
            districtArray[12] = "Feni";
            districtArray[13] = "Khagrachhari";
            districtArray[14] = "Lakshmipur";
            districtArray[15] = "Noakhali";
            districtArray[16] = "Rangamati";
            districtArray[17] = "Dhaka";
            districtArray[18] = "Faridpur";
            districtArray[19] = "Gazipur";
            districtArray[20] = "Gopalganj";
            districtArray[21] = "Kishoreganj";
            districtArray[22] = "Madaripur";
            districtArray[23] = "Manikganj";
            districtArray[24] = "Munshiganj";
            districtArray[25] = "Narayanganj";
            districtArray[26] = "Narsingdi";
            districtArray[27] = "Rajbari";
            districtArray[28] = "Shariatpur";
            districtArray[29] = "Tangail";
            districtArray[30] = "Bagerhat";
            districtArray[31] = "Chuadanga";
            districtArray[32] = "Jessore";
            districtArray[33] = "Jhenaidah";
            districtArray[34] = "Khulna";
            districtArray[35] = "Kushtia";
            districtArray[36] = "Magura";
            districtArray[37] = "Meherpur";
            districtArray[38] = "Narail";
            districtArray[39] = "Satkhira";
            districtArray[40] = "Jamalpur";
            districtArray[41] = "Mymensingh";
            districtArray[42] = "Netrakona";
            districtArray[43] = "Sherpur";
            districtArray[44] = "Bogra";
            districtArray[45] = "Chapainawabganj";
            districtArray[46] = "Joypurhat";
            districtArray[47] = "Naogaon";
            districtArray[48] = "Natore";
            districtArray[49] = "Pabna";
            districtArray[50] = "Rajshahi";
            districtArray[51] = "Sirajganj";
            districtArray[52] = "Dinajpur";
            districtArray[53] = "Gaibandha";
            districtArray[54] = "Kurigram";
            districtArray[55] = "Lalmonirhat";
            districtArray[56] = "Nilphamari";
            districtArray[57] = "Panchagarh";
            districtArray[58] = "Rangpur";
            districtArray[59] = "Thakurgaon";
            districtArray[60] = "Habiganj";
            districtArray[61] = "Moulvibazar";
            districtArray[62] = "Sunamganj";
            districtArray[63] = "Sylhet";
            for (district = 0; district <= 63; district++) {
                var optn = document.createElement("OPTION");
                optn.text = districtArray[district];
                office_district.options.add(optn);
            }
        };
        if (document.getElementById('choices-present-district')) {
            var present_district = document.getElementById('choices-present-district');
            setTimeout(function() {
                const example = new Choices(present_district);
                searchEnabled: false
            });

            var present_districtArray
            for (district = 0; district <= 63; district++) {
                var optn = document.createElement("OPTION");
                optn.text = districtArray[district];
                present_district.options.add(optn);
            }
        };
        if (document.getElementById('choices-permanent-district')) {
            var permanent_district = document.getElementById('choices-permanent-district');
            setTimeout(function() {
                const example = new Choices(permanent_district);
                searchEnabled: false
            });

            var present_districtArray
            for (district = 0; district <= 63; district++) {
                var optn = document.createElement("OPTION");
                optn.text = districtArray[district];
                permanent_district.options.add(optn);
            }
        };


        if (document.querySelector('.datetimepicker')) {
            flatpickr('.datetimepicker', {
                format: "d-m-Y",
                altFormat: "d-m-Y",
                allowInput: true,
                altInput: true
            }); // flatpickr
        }
        if (document.getElementById('choices-bloodgroup')) {
            var bloodgroup = document.getElementById('choices-bloodgroup');
            setTimeout(function() {
                const example = new Choices(bloodgroup);
            });

            var bloodgroupArray = new Array();
            bloodgroupArray[0] = "A+";
            bloodgroupArray[1] = "A-";
            bloodgroupArray[2] = "B+";
            bloodgroupArray[3] = "B-";
            bloodgroupArray[4] = "O+";
            bloodgroupArray[5] = "O-";
            bloodgroupArray[6] = "AB+";
            bloodgroupArray[7] = "AB-";
            for (bg = 0; bg <= 7; bg++) {
                var optn = document.createElement("OPTION");
                optn.text = bloodgroupArray[bg];
                // server side blood group start from one
                bloodgroup.options.add(optn);
            }
        }
        if (document.getElementById('choices-gender')) {
            var gender = document.getElementById('choices-gender');
            setTimeout(function() {
                const example = new Choices(gender);
            });

            var genderArray = new Array();
            genderArray[0] = "Male";
            genderArray[1] = "Female";
            for (gen = 0; gen <= 1; gen++) {
                var optn = document.createElement("OPTION");
                optn.text = genderArray[gen];
                // server side blood group start from one
                gender.options.add(optn);
            }
        }
        if (document.getElementById('choices-nominee-gender')) {
            var gender = document.getElementById('choices-nominee-gender');
            setTimeout(function() {
                const example = new Choices(gender);
            });

            var genderArray = new Array();
            genderArray[0] = "Male";
            genderArray[1] = "Female";
            for (gen = 0; gen <= 1; gen++) {
                var optn = document.createElement("OPTION");
                optn.text = genderArray[gen];
                // server side blood group start from one
                gender.options.add(optn);
            }
        }
        if (document.getElementById('choices-marital_status')) {
            var marital_status = document.getElementById('choices-marital_status');
            setTimeout(function() {
                const example = new Choices(marital_status);
            });

            var merital_statusArray = new Array();
            merital_statusArray[0] = "Married";
            merital_statusArray[1] = "Unmarried";
            merital_statusArray[2] = "Divorsed";
            for (ms = 0; ms <= 2; ms++) {
                var optn = document.createElement("OPTION");
                optn.text = merital_statusArray[ms];
                // server side blood group start from one
                marital_status.options.add(optn);
            }
        }
    </script>
    {{-- JS for Profile Edit End --}}

    {{-- JS for Relational Information End --}}
    //
    <script>
        //     if (document.getElementById('choices-relationship')) {
        //         var relationship = document.getElementById('choices-relationship');
        //         setTimeout(function() {
        //             const example = new Choices(relationship);
        //         });

        //         var merital_statusArray = new Array();
        //         merital_statusArray[0] = "Husband";
        //         merital_statusArray[1] = "Wife";
        //         merital_statusArray[2] = "Children";
        //         for (ms = 0; ms <= 2; ms++) {
        //             var optn = document.createElement("OPTION");
        //             optn.text = merital_statusArray[ms];
        //             // server side blood group start from one
        //             relationship.options.add(optn);
        //         }
        //     }
        //
    </script>
    {{-- JS for Relational Information End --}}

    <script src="jquery-3.6.0.min.js"></script>

    {{-- JS for Payment Edit Start --}}
    <script>
        if (document.getElementById('choices-state')) {
            var element = document.getElementById('choices-state');
            const example = new Choices(element, {
                searchEnabled: false
            });
        };
        if (document.getElementById('choices-month')) {
            var month = document.getElementById('choices-month');
            setTimeout(function() {
                const example = new Choices(month);
            }, 1);

            var d = new Date();
            var monthArray = new Array();
            monthArray[0] = "January";
            monthArray[1] = "February";
            monthArray[2] = "March";
            monthArray[3] = "April";
            monthArray[4] = "May";
            monthArray[5] = "June";
            monthArray[6] = "July";
            monthArray[7] = "August";
            monthArray[8] = "September";
            monthArray[9] = "October";
            monthArray[10] = "November";
            monthArray[11] = "December";
            for (m = 0; m <= 11; m++) {
                var optn = document.createElement("OPTION");
                optn.text = monthArray[m];
                // server side month start from one
                optn.value = (m + 1);
                // if june selected
                if (m == 1) {
                    optn.selected = false;
                }
                month.options.add(optn);
            }
        }
        if (document.getElementById('choices-year')) {
            var year = document.getElementById('choices-year');
            setTimeout(function() {
                const example = new Choices(year);
            }, 1);

            for (y = 1999; y <= 2030; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == 2020) {
                    optn.selected = false;
                }

                year.options.add(optn);
            }
        }
        if (document.getElementById('choices-to-month')) {
            var to_month = document.getElementById('choices-to-month');
            setTimeout(function() {
                const example = new Choices(to_month);
            }, 1);

            var d = new Date();
            var monthArray = new Array();
            monthArray[0] = "January";
            monthArray[1] = "February";
            monthArray[2] = "March";
            monthArray[3] = "April";
            monthArray[4] = "May";
            monthArray[5] = "June";
            monthArray[6] = "July";
            monthArray[7] = "August";
            monthArray[8] = "September";
            monthArray[9] = "October";
            monthArray[10] = "November";
            monthArray[11] = "December";
            for (m = 0; m <= 11; m++) {
                var optn = document.createElement("OPTION");
                optn.text = monthArray[m];
                // server side month start from one
                optn.value = (m + 1);
                // if june selected
                if (m == 1) {
                    optn.selected = false;
                }
                to_month.options.add(optn);
            }
        }
        if (document.getElementById('choices-to-year')) {
            var to_year = document.getElementById('choices-to-year');
            setTimeout(function() {
                const example = new Choices(to_year);
            }, 1);

            for (y = 1999; y <= 2030; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == 2020) {
                    optn.selected = false;
                }

                to_year.options.add(optn);
            }
        }
        if (document.getElementById('choices-spouse')) {
            var element = document.getElementById('choices-spouse');
            const example = new Choices(element, {
                searchEnabled: false
            });
        };
        if (document.getElementById('choices-guest')) {
            var element = document.getElementById('choices-guest');
            const example = new Choices(element, {
                searchEnabled: false
            });
        };
        if (document.getElementById('choices-child_num')) {
            var element = document.getElementById('choices-child_num');
            const example = new Choices(element, {
                searchEnabled: false
            });
        };
        if (document.getElementById('choices-m-o-pay')) {
            var element = document.getElementById('choices-m-o-pay');
            const example = new Choices(element, {
                searchEnabled: false
            });
        };
        if (document.getElementById('choices-transaction-type')) {
            var element = document.getElementById('choices-transaction-type');
            const example = new Choices(element, {
                searchEnabled: false
            });
        };
        if (document.getElementById('choices-transaction-purpose')) {
            var element = document.getElementById('choices-transaction-purpose');
            const example = new Choices(element, {
                searchEnabled: false
            });
        };
        if (document.querySelector('.datetimepicker')) {
            flatpickr('.datetimepicker', {
                format: "d-m-Y",
                altFormat: "d-m-Y",
                allowInput: true,
                altInput: true
            }); //  flatpickr


        };

        $(document).ready(function() {
            $("#choices-state").on('change', function() {
                $(".data").hide();
                $("#" + $(this).val()).fadeIn();
            }).change();
        });
    </script>
    {{-- JS for Payment Edit end --}}
    <script src="{{ asset('ui/admin-ui/assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('ui/admin-ui/assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('ui/admin-ui/assets') }}/js/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('ui/admin-ui/assets') }}/js/smooth-scrollbar.min.js"></script>
    <script src="{{ asset('ui/admin-ui/assets') }}/js/datatables.js"></script>
    <script src="{{ asset('ui/admin-ui/assets') }}/js/dragula.min.js"></script>
    <script src="{{ asset('ui/admin-ui/assets') }}/js/jkanban.js"></script>
    <script>
        src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('ui/admin-ui/assets') }}/js/material-dashboard.min.js?v=3.0.6"></script>
    <!-- Data Table -->
    <script>
        var dataTableSearch = new simpleDatatables.DataTable("#memberRequest", {
            searchable: true,
            fixedHeight: false
        });
        var dataTableSearch = new simpleDatatables.DataTable("#reunionPayment", {
            searchable: true,
            fixedHeight: false
        });
        var dataTableSearch = new simpleDatatables.DataTable("#welfarePayment", {
            searchable: true,
            fixedHeight: false
        });
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
        integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
        data-cf-beacon='{" rayId":" 7586d8543a24ab68"," token":"
                                        1b7cbb72744b40c580f8633c6b62637e"," version":" 2022.8.1"," si":100}'
        crossorigin="anonymous"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('ui/admin-ui/assets') }}/js/material-dashboard.min.js?v=3.0.4"></script>
    @stack('css');
    @stack('scripts');


    
    <script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>


</body>

</html>
