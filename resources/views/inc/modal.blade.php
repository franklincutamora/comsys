<div class="modal" tabindex="-1" role="dialog" id="confirmDelete" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            {!! Form::open(['action' => ['Persons\PersonsController@destroy', $person->id]]) !!}
            @csrf
            {{ Form::hidden('_method', 'DELETE') }}
            <delete-modal-content></delete-modal-content>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="searchPerson" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            {!! Form::open(['action' => 'Persons\PersonsController@search']) !!}
            @csrf
            {{ Form::hidden('_method', 'POST') }}
            <search-modal-content></search-modal-content>
            {!! Form::close() !!}
        </div>
    </div>
</div>