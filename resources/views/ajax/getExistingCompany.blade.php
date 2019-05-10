@if($data)
<ul id="country-list">
    @foreach($data as $d)
    <li onclick="selectCountry('{{$d->name}}', '{{$d->id}}')">{{$d->name}}</li>
    @endforeach
</ul>
@endif