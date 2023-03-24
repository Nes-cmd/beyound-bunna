
<li class="dropdown search dropdown-slide">
    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-ios-search-strong"></i> Search</a>
    <ul class="dropdown-menu search-dropdown">
        <li>
            <input  wire:model="query" wire:keydown.enter="search" type="search" list="suggest" class="form-control" placeholder="Search...">
            <datalist id="suggest"> 
            @foreach ($suggestions as $suggestion)
                <option class="pl-6" value="{{$suggestion->name}}">{{ $suggestion->name }}</option>
            @endforeach
    </datalist>
        </li>
    </ul>
</li>
