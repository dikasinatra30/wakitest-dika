<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class SoalController extends Controller
{
    public function soal1(Request $request)
    {
        $kata = "";
        if ($request->kata) {
            $kata = $request->kata;
            if (strrev($kata) == $kata){ 
                $kata = "Kata ". $kata ." adalah palindrome";
            }
            else{
                $kata = "Kata ". $kata ." tidak palindrome";
            }
        }

        return view('soal1')
            ->with('kata', $kata);
    }

    public function soal2(Request $request)
    {
        $kata = "";
        if ($request->kata1 && $request->kata2) {
            $kata1 = $request->kata1;
            $kata2 = $request->kata2;

            $validate = count_chars($kata1, 1) == count_chars($kata2, 1);
            if ($validate) {
                $kata = "Kata ". $kata1 ." & ". $kata2 ." adalah anagram"; 
            } else {
                $kata = "Kata ". $kata1 ." & ". $kata2 ." tidak anagram"; 
            }
        }

        return view('soal2')
            ->with('kata', $kata);
    }

    public function soal3()
    {
        //
        return view('soal3');
    }

    public function soal4(Request $request)
    {
        $customers = Customer::all();

        return view('soal4')
            ->with('customers', $customers);
    }

    public function post_soal4(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers',
        ]);
        
        $customer = new Customer;
        $customer = $customer->fill($request->all()); 
        $customer->save();

        return redirect()->route('soal4');
    }

    public function update_soal4(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $customer = $customer->where('id', $request->id)->first();
        $customer = $customer->fill($request->all()); 
        $customer->save();

        return redirect()->route('soal4');
    }

    public function destroy_soal4(Request $request, Customer $customer)
    {
        $customer = $customer->where('id', $request->id)->firstOrFail();
        $customer->delete();

        return redirect()->route('soal4');
    }
}
