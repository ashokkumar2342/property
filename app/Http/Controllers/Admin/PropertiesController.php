<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Helper\MyFuncs;

class PropertiesController extends Controller
{
    public function index()
    {
        $user_id = MyFuncs::getUserId();
        
        // Base Query for Admin (user_id == 1)
        $query = "
           SELECT
                p.id,
                p.title,
                p.base_price,
                p.market_price,
                p.latitude,
                p.longitude,
                pt.name AS type_name,
                ps.name AS status_name,
                c.name AS city_name,
                d.name AS district_name,
                s.name AS state_name,
                DATE_FORMAT(p.auction_start_datetime, '%d-%m-%Y %H:%i') AS auction_start_datetime,
                DATE_FORMAT(p.auction_end_datetime, '%d-%m-%Y %H:%i') AS auction_end_datetime,
                p.property_system_id,
                p.bank_name,
                p.possession_status
           FROM properties p
           LEFT JOIN property_types pt ON pt.id = p.property_type_id
           LEFT JOIN property_statuses ps ON ps.id = p.status_id
           LEFT JOIN cities c ON c.id = p.city_id
           LEFT JOIN districts d ON d.id = p.district_id
           LEFT JOIN states s ON s.id = p.state_id
        ";

        if ($user_id == 1) {
            $rs_records = DB::select(DB::raw($query . " ORDER BY p.title;"));
        } else {
            $rs_records = DB::select(DB::raw($query . " WHERE p.seller_id = $user_id ORDER BY p.title;"));
        }

        return view('admin.properties.index', compact('rs_records'));
    }

    public function addform($id)
    {
        $rec_id = intval(Crypt::decrypt($id));
        $rs_types = DB::select(DB::raw("SELECT id, name FROM property_types;"));
        $rs_statuses = DB::select(DB::raw("SELECT id, name FROM property_statuses;"));
        $rs_states = DB::select(DB::raw("SELECT id, name FROM states;"));
        $rs_districts = DB::select(DB::raw("SELECT id, name FROM districts;"));
        $rs_cities = DB::select(DB::raw("SELECT id, name FROM cities;"));
        
        // Fetch ownership types for dropdown
        $rs_ownership_types = ['Freehold', 'Leasehold', 'Co-operative Society', 'Power of Attorney'];
        
        $rs_records = DB::select(DB::raw("SELECT * FROM properties WHERE id = $rec_id LIMIT 1;"));
        $rs_records = reset($rs_records);
        
        return view('admin.properties.add_form', compact('rs_records', 'rec_id', 'rs_types', 'rs_statuses', 'rs_states', 'rs_districts', 'rs_cities', 'rs_ownership_types'));
    }

    public function store(Request $request, $rec_id)
    {
        // Validation rules
        $rules = [
            'title' => 'required|max:255',
            'property_type_id' => 'required|integer',
            'status_id' => 'required|integer',
            'base_price' => 'required|numeric', // Base Price
            'reserve_price' => 'nullable|numeric', // Market Price
            'property_system_id' => 'required|unique:properties,property_system_id,' . Crypt::decrypt($rec_id),
            'auction_start' => 'nullable|date',
            'auction_end' => 'nullable|date',
            'emd_end_datetime' => 'nullable|date',
            'carpet_area' => 'nullable|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'msg' => $validator->errors()->first()]);
        }

        $rec_id = Crypt::decrypt($rec_id);
        $user_id = MyFuncs::getUserId();

        // Prepare data array
        $data = [
            'title' => MyFuncs::removeSpacialChr($request->title),
            'description' => MyFuncs::removeSpacialChr($request->description),
            'ownership_type' => MyFuncs::removeSpacialChr($request->ownership_type),
            'address_line' => MyFuncs::removeSpacialChr($request->address),
            'city_id' => intval($request->city_id),
            'district_id' => intval($request->district_id),
            'state_id' => intval($request->state_id),
            'pincode' => MyFuncs::removeSpacialChr($request->pincode),
            'latitude' => $request->latitude ?: null,
            'longitude' => $request->longitude ?: null,
            'carpet_area' => $request->carpet_area ?: null,
            'built_up_area' => $request->built_up_area ?: null,
            'land_area' => $request->land_area ?: null,
            'unit' => $request->unit,
            'base_price' => $request->base_price,
            'market_price' => $request->reserve_price,
            'registration_number' => MyFuncs::removeSpacialChr($request->registration_number),
            'registration_date' => $request->registration_date ?: null,
            'legal_clearance' => $request->legal_clearance,
            'property_type_id' => intval($request->property_type_id),
            'status_id' => intval($request->status_id),
            'property_system_id' => MyFuncs::removeSpacialChr($request->property_system_id),
            'auction_start_datetime' => $request->auction_start ?: null,
            'auction_end_datetime' => $request->auction_end ?: null,
            'emd_end_datetime' => $request->emd_end_datetime ?: null,
            'bank_name' => MyFuncs::removeSpacialChr($request->bank_name),
            'borrower_name' => MyFuncs::removeSpacialChr($request->borrower_name),
            'co_borrower_names' => MyFuncs::removeSpacialChr($request->co_borrower_names),
            'borrower_registered_address' => MyFuncs::removeSpacialChr($request->borrower_registered_address),
            'title_deed_type' => MyFuncs::removeSpacialChr($request->title_deed_type),
            'type_of_action' => MyFuncs::removeSpacialChr($request->type_of_action),
            'cersai_id' => MyFuncs::removeSpacialChr($request->cersai_id),
            'possession_status' => MyFuncs::removeSpacialChr($request->possession_status),
            'num_of_rooms' => intval($request->num_of_rooms) ?: null,
            'floor_no' => intval($request->floor_no) ?: null,
            'unit_on_floor' => intval($request->unit_on_floor) ?: null,
            'num_of_car_parking' => intval($request->num_of_car_parking) ?: null,
            'num_of_floors_project' => intval($request->num_of_floors_project) ?: null,
            'age_of_construction' => intval($request->age_of_construction) ?: null,
            'facing' => MyFuncs::removeSpacialChr($request->facing),
            'water_availability' => $request->water_availability,
            'developer_name' => MyFuncs::removeSpacialChr($request->developer_name),
            'nearby_localities' => MyFuncs::removeSpacialChr($request->nearby_localities),
            'usps' => MyFuncs::removeSpacialChr($request->usps),
            'other_detail' => MyFuncs::removeSpacialChr($request->other_detail),
        ];

        // Insert or update using Query Builder
        if ($rec_id == 0) {
            $data['seller_id'] = $user_id;
            DB::table('properties')->insert($data);
            return response()->json(['status' => 1, 'msg' => 'Property Added Successfully']);
        } else {
            DB::table('properties')->where('id', $rec_id)->update($data);
            return response()->json(['status' => 1, 'msg' => 'Property Updated Successfully']);
        }
    }


    public function delete($id)
    {
        $id = intval(Crypt::decrypt($id));
        DB::delete(DB::raw("DELETE FROM properties WHERE id = $id LIMIT 1;"));
        return redirect()->back()->with(['message' => 'Deleted Successfully', 'class' => 'success']);
    }

    public function imagesFormShow(Request $request, $id)
    {

       
        return view('admin.properties.image_form', compact('id'));
    }

    public function storeImage(Request $request, $id)
    {
        $request->validate([
            'attachment' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $id =Crypt::decrypt($id);

        $path = $request->file('attachment')->store('property_images', 'public');

        DB::table('property_images')->insert([
            'property_id' => $id,
            'image_url' => $path,
            'uploaded_at' => now(),
        ]);
        return response()->json(['status' => 1, 'msg' => 'Image uploaded successfully.']);
    }
}
