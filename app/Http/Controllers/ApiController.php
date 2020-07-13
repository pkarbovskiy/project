<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Widget;

class ApiController extends Controller
{
    public function getAllWidgets(Request $request) {
        $widgets = Widget::get()->toJson(JSON_PRETTY_PRINT);
        return response($widgets, 200);
    }

    public function createWidget(Request $request) {
        if (is_null($request->name)) {
            return response()->json([
                "message" => "name is required"
            ], 400);
        }
        $widget = new Widget;

        $widget->name = $request->name;
        $widget->description = $request->description;

        $widget->save();

        return response()->json([
            "message" => "widget record was created"
        ], 201);
    }

    public function getWidget($id) {
        
        if (Widget::where('id', $id)->exists()) {
           
            $widget = Widget::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            
            return response($widget, 200);
        } else {

            return response()->json([
                "message" => "Widget not found"
            ], 404);
        }
    }

    public function updateWidget(Request $request, $id) {
        
        if (Widget::where('id', $id)->exists()) {

            $widget = Widget::find($id);
            var_dump($request->name, $request->description);
            $widget->name = is_null($request->name) ? $widget->name : $request->name;
            $widget->description = is_null($request->description) ? $widget->description : $request->description;

            $widget->save();
    
            return response()->json([
                "message" => "widget was updated successfully"
            ], 200);
        } else {

            return response()->json([
                "message" => "Widget not found"
            ], 404);            
        }
    }

    public function deleteWidget ($id) {
        if (Widget::where('id', $id)->exists()) {
            
            $widget = Widget::find($id);
            
            $widget->delete();
    
            return response()->json([
              "message" => "records was deleted"
            ], 204);            
        } else {

            return response()->json([
              "message" => "Widget not found"
            ], 404);
        }
    }
}
