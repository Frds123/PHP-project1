<?php

namespace App\Exports;

use App\Models\Profile;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class exportMemberList implements
    FromCollection,
    ShouldAutoSize,
    WithEvents,
    WithColumnWidths,
    WithDrawings,
    WithMapping,
    WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        return User::where('status', 1)->with('profile', 'nominee', 'faculty')->get();
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->faculty->title ?? '',
            $user->email,
            $user->status ? 'Approved' : 'Reject',
            $user->role_id ? 'Admin' : 'Member',
            $user->profile->membership_no,
            // $user->profile->bank_id,
            $user->profile->mobile_no,
            $user->profile->blood_group,
            $user->profile->date_of_birth,
            $user->profile->profile_pic,
            $user->profile->gender,
            $user->profile->marital_status,
            $user->profile->father_name,
            $user->profile->mother_name,
            $user->profile->profession,
            $user->profile->designation,
            $user->profile->organization,
            $user->profile->office_address,
            $user->profile->office_add_ps,
            $user->profile->office_district,
            $user->profile->office_add_zip,
            $user->profile->academic_regi_no,
            $user->profile->academic_hall_of_residence,
            $user->profile->present_address,
            $user->profile->present_add_ps,
            $user->profile->present_district,
            $user->profile->present_add_zip,
            $user->profile->permanent_address,
            $user->profile->permanent_add_ps,
            $user->profile->permanent_district,
            $user->profile->permanent_add_zip,
            $user->nominee->name,
            $user->nominee->nominee_picture,
            $user->nominee->fathers_name,
            $user->nominee->mothers_name,
            $user->nominee->present_address,
            $user->nominee->permanent_address,
            $user->nominee->percentage,
            $user->nominee->relation,
            $user->nominee->date_of_birth,
            $user->nominee->gender,
            $user->created_at

        ];
    }
    public function drawings()
    {
        $data = User::where('status', 1)->with('profile')->get();
        $drawings = [];
        foreach ($data as $key => $profile_data) {
            $drawing = new Drawing();
            $drawing->setName('Profile Picture');
            $drawing->setDescription('This is my Picture');
            $drawing->setPath(public_path('storage/profile/' . $profile_data->profile->profile_pic ?? ''));
            $drawing->setHeight(20);
            $drawing->setCoordinates('K2');
            $drawings[] = ($drawing);
        }
        return $drawings;
    }
    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 30,
            'F' => 30,
            'G' => 30,
            'H' => 30,
            'I' => 30,
            'J' => 30,
            'K' => 30,
            'L' => 30,
            'M' => 30,
            'N' => 30,
            'O' => 30,
            'P' => 30,
            'Q' => 30,
            'R' => 30,
            'S' => 30,
            'T' => 30,
            'U' => 30,
            'V' => 30,
            'W' => 30,
            'X' => 30,
            'Y' => 30,
            'Z' => 30,
            'AA' => 30,
            'AB' => 30,
            'AC' => 30,
            'AD' => 30,
            'AE' => 30,
            'AF' => 30,
            'AG' => 30,
            'AH' => 30,
            'AI' => 30,
            'AJ' => 30,
            'AK' => 30,
            'AL' => 30,
            'AM' => 30,
            'AN' => 30,
            'AO' => 30,
            'AP' => 30,
            'AQ' => 30,
        ];
    }

    public function headings(): array
    {
        return [
            'User ID',
            'Alumni Name',
            'Faculty Name',
            'Email',
            'Status',
            'Role',
            'Membership No',
            // 'Bank ID',
            'Mobile No',
            'Blood Group',
            'Date of Birth',
            'Profile Picture',
            'Gender',
            'Marital Status',
            'Father Name',
            'Mother Name',
            'Profession',
            'Designation',
            'Organization',
            'Office Address',
            'Office Address Post Office',
            'Office address District',
            'Office address Zip Code',
            'Academic Regi No',
            'Academic Hall of Residence',
            'Present Address',
            'Post Office',
            'District',
            'Zip Code',
            'Permanent Address',
            'Post Office',
            'District',
            'Zip Code',
            'Nominee Name',
            'Nominee Picture',
            "Nominee's Father name",
            "Nominee's Mother name",
            "Nominee's Present Address",
            "Nominee's Permanent Address",
            "Nominee's Percentage",
            "Nominee's Relation",
            "Nominee's Date of Birth",
            "Nominee's Gender",
            "Created"
        ];
    }

    public function registerEvents(): array
    {
        return [

            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:AQ1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ]
                ]);
            }
        ];
    }
}
