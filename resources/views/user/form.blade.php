<form action="{{ route('server.store') }}" method="post">

    {{csrf_field()}}

    <div class="modal-header">
        <h5 id="createServerHeading" class="modal-title">Create Server</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
    </div>

    <div class="modal-body">
        <div class="form-group">
            <label>Server Name</label>
            <input type="text" name="serverName" id="serverName" placeholder="Enter server name" class="form-control {{ $errors->has('serverName') ? ' is-invalid' : '' }}" maxlength="150">

            @if ($errors->has('serverName'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('serverName') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label>Host</label>
            <input type="text" name="serverHost" id="serverHost" placeholder="Enter host" class="form-control {{ $errors->has('serverHost') ? ' is-invalid' : '' }}" maxlength="150">

            @if ($errors->has('serverHost'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('serverHost') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" name="serverLocation" id="serverLocation" placeholder="Enter location" class="form-control {{ $errors->has('serverLocation') ? ' is-invalid' : '' }}" maxlength="150">

            @if ($errors->has('serverHost'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('serverLocation') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label>VPN Server Limit</label>
            <input type="number" name="serverLimit" id="serverLimit" placeholder="Enter limit" class="form-control {{ $errors->has('serverLimit') ? ' is-invalid' : '' }}" maxlength="150">
            @if ($errors->has('serverHost'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('serverLimit') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="serverDescription" id="serverDescription" class="form-control" rows="3" placeholder="Description..." maxlength="500"></textarea>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="submit" class="btn btn-primary">Create Server</button>
    </div>

</form>