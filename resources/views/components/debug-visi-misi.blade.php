{{-- Debug Component - resources/views/components/debug-visi-misi.blade.php --}}
<div style="background: #f8f9fa; padding: 20px; margin: 20px 0; border: 1px solid #ddd;">
    <h3>DEBUG VISI MISI</h3>
    
    <h4>Raw Data:</h4>
    <pre>{{ print_r($data, true) }}</pre>
    
    @php
        // Handle different data formats
        if (isset($data->visi) && isset($data->misi)) {
            $visi = $data->visi;
            $misi = $data->misi;
        } else {
            if (is_object($data) && isset($data->type)) {
                if ($data->type === 'visi') {
                    $visi = $data;
                    $misi = null;
                } else {
                    $visi = null;
                    $misi = $data;
                }
            } else {
                $items = is_array($data) ? collect($data) : $data;
                $visi = $items->where('type', 'visi')->first();
                $misi = $items->where('type', 'misi')->first();
            }
        }
    @endphp
    
    <h4>Processed Data:</h4>
    <p><strong>Visi:</strong> {{ $visi ? 'Ada (' . $visi->title . ')' : 'Tidak ada' }}</p>
    <p><strong>Misi:</strong> {{ $misi ? 'Ada (' . $misi->title . ')' : 'Tidak ada' }}</p>
    
    @if($visi)
        <h5>Visi Points:</h5>
        <pre>{{ print_r($visi->points, true) }}</pre>
    @endif
    
    @if($misi)
        <h5>Misi Points:</h5>
        <pre>{{ print_r($misi->points, true) }}</pre>
    @endif
    
    <h4>Check Database:</h4>
    <p>Total records: {{ \App\Models\VisiMisi::count() }}</p>
    <p>Active records: {{ \App\Models\VisiMisi::where('is_active', 1)->count() }}</p>
    <p>Visi records: {{ \App\Models\VisiMisi::where('type', 'visi')->count() }}</p>
    <p>Misi records: {{ \App\Models\VisiMisi::where('type', 'misi')->count() }}</p>
    
    <h5>All records:</h5>
    @foreach(\App\Models\VisiMisi::all() as $item)
        <p>ID: {{ $item->id }} | Type: {{ $item->type }} | Title: {{ $item->title }} | Active: {{ $item->is_active ? 'Yes' : 'No' }}</p>
    @endforeach
</div>