<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Product;
use App\Models\QuoteRequest;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $brands = Brand::where('is_active', true)->orderBy('order')->get();
        $featuredProducts = Product::with(['brand', 'category'])
            ->where('is_active', true)
            ->where('is_featured', true)
            ->take(6)
            ->get();
        $featuredServices = Service::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('order')
            ->get();
        $remainingServices = Service::where('is_active', true)
            ->where('is_featured', false)
            ->orderBy('order')
            ->get();
        $services = Service::where('is_active', true)
            ->orderByRaw('is_featured DESC, "order" ASC')
            ->get();
        $faqs = Faq::where('is_active', true)->orderBy('order')->get();
        $testimonials = Testimonial::where('is_featured', true)->get();

        return view('pages.home', compact(
            'brands',
            'featuredProducts',
            'featuredServices',
            'remainingServices',
            'services',
            'faqs',
            'testimonials'
        ));
    }

    public function catalog(Request $request)
    {
        $query = Product::with(['brand', 'category'])->where('is_active', true);

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('brand')) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->where('slug', $request->brand);
            });
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::where('is_active', true)->get();
        $brands = Brand::where('is_active', true)->orderBy('name')->get();

        return view('pages.catalog', compact('products', 'categories', 'brands'));
    }

    public function serviceShow($slug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $otherServices = Service::where('id', '!=', $service->id)->where('is_active', true)->get();
        $brands = Brand::where('is_active', true)->take(6)->get();

        return view('pages.service-detail', compact('service', 'otherServices', 'brands'));
    }

    public function contact(Request $request)
    {
        $selectedService = $request->get('servicio', '');
        return view('pages.contact', compact('selectedService'));
    }

    public function submitQuote(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'company' => 'required|string|max:255',
            'role' => 'nullable|string|max:150',
            'service_type' => 'required|string',
            'equipment_interest' => 'nullable|string|max:255',
            'details' => 'nullable|string|max:2000',
        ]);

        $quote = QuoteRequest::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'company' => $validated['company'],
            'role' => $validated['role'] ?? 'No especificado',
            'service_type' => $validated['service_type'],
            'equipment_interest' => $validated['equipment_interest'] ?? null,
            'details' => $validated['details'] ?? null,
            'status' => 'nuevo',
        ]);

        return redirect()->back()->with('success', "¡Solicitud recibida con éxito! Folio asignado: {$quote->folio}. Un especialista técnico de Enjoy Safety Group se comunicará en menos de 2 horas hábiles.");
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }
}

