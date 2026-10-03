<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicineController extends Controller
{
    private function medicines(){
        $path = storage_path('app/medicines.json');

        return json_decode(file_get_contents($path), true);
    }

    private function saveMedicines(array $medicines){

        file_put_contents(storage_path('app/medicines.json'),
        json_encode($medicines, JSON_PRETTY_PRINT)
        );

    }

    public function index(Request $request)
    {
        $type = $request->query('type', 'all');
        $stock = $request->query('stock', 'all');

        $all = $this->medicines();

        if($type === 'all' && $stock === 'all'){

            $medicines = $all;

        } else {
            $medicines = [];

            foreach($all as $id => $medicine){

                if (($type === 'all' || $medicine['type'] == $type)
                    && ($stock === 'all' || $medicine['stock'] == $stock)) {
                    $medicines[$id] = $medicine;
                }
            }

        }

         return view('medicines.index',
         ['medicines' => $medicines,
          'type' => $type, 'stock' => $stock]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

        'name' => 'required|max:100',
        'stock' => 'required|in:lowstock,full',
        'expiry_date' => 'required',
        'type' => 'required|max:100|in:Capsule,Tablet,Syrup',
        'available' => 'required| in:true,false'
        ]);

       $medicines = $this->medicines();
       $id = max(array_keys($medicines)) + 1;

       $medicines[$id] = [
        'id' => $id,
        'name' => $request->input('name'),
        'stock' => $request->input('stock'),
        'expiry_date' => $request->input('expiry_date'),
        'type' => $request->input('type'),
        'is_available' => $request->input('is_available') === 'true',
       ];

       $this->saveMedicines($medicines);
       return view('medicines.create', ['success' => true]);
    }


    /**
     * Display the specified resource.
     */
    public function show($id = 5)
    {

        $medicines = $this->medicines();

            if(!isset($medicines[$id]))
            {

                abort(404);
            }

            return view('medicines.show', ['medicine' => $medicines[$id]]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function filter($type = null)
    {

        $medicines = $this->medicines();
        $result = [];

       foreach ($medicines as $medicine) {
                if ($type == null) {
                    $result[] = $medicine;
                } elseif ($medicine['type'] == $type) {
                    $result[] = $medicine;
                }
            }

            return view('medicines.filter', [
                'medicines' => $result,
                'filter' => $type,
            ]);

    }


}


