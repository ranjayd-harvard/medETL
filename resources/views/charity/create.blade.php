@extends('layouts.app')

@section('title')
    Add a new Charity
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add a new Charity</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ url('/charitys') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Charity Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Charity Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" name="description" rows="5" class="form-control"></textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                                <label for="address1" class="col-md-4 control-label">Address 1</label>

                                <div class="col-md-6">
                                    <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1') }}" required autofocus>

                                    @if ($errors->has('address1'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                                <label for="address1" class="col-md-4 control-label">Address 2</label>

                                <div class="col-md-6">
                                    <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') }}" autofocus>

                                    @if ($errors->has('address2'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="city" class="col-md-4 control-label">City</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autofocus>

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                <label for="state" class="col-md-4 control-label">State </label>

                                <div class="col-md-6">
                                    <select id="state" class="form-control" name="state" value="{{ old('state') }}"  required autofocus>
                                    	<option value="AL">Alabama</option>
                                    	<option value="AK">Alaska</option>
                                    	<option value="AZ">Arizona</option>
                                    	<option value="AR">Arkansas</option>
                                    	<option value="CA">California</option>
                                    	<option value="CO">Colorado</option>
                                    	<option value="CT">Connecticut</option>
                                    	<option value="DE">Delaware</option>
                                    	<option value="DC">District Of Columbia</option>
                                    	<option value="FL">Florida</option>
                                    	<option value="GA">Georgia</option>
                                    	<option value="HI">Hawaii</option>
                                    	<option value="ID">Idaho</option>
                                    	<option value="IL">Illinois</option>
                                    	<option value="IN">Indiana</option>
                                    	<option value="IA">Iowa</option>
                                    	<option value="KS">Kansas</option>
                                    	<option value="KY">Kentucky</option>
                                    	<option value="LA">Louisiana</option>
                                    	<option value="ME">Maine</option>
                                    	<option value="MD">Maryland</option>
                                    	<option value="MA">Massachusetts</option>
                                    	<option value="MI">Michigan</option>
                                    	<option value="MN">Minnesota</option>
                                    	<option value="MS">Mississippi</option>
                                    	<option value="MO">Missouri</option>
                                    	<option value="MT">Montana</option>
                                    	<option value="NE">Nebraska</option>
                                    	<option value="NV">Nevada</option>
                                    	<option value="NH">New Hampshire</option>
                                    	<option value="NJ">New Jersey</option>
                                    	<option value="NM">New Mexico</option>
                                    	<option value="NY">New York</option>
                                    	<option value="NC">North Carolina</option>
                                    	<option value="ND">North Dakota</option>
                                    	<option value="OH">Ohio</option>
                                    	<option value="OK">Oklahoma</option>
                                    	<option value="OR">Oregon</option>
                                    	<option value="PA">Pennsylvania</option>
                                    	<option value="RI">Rhode Island</option>
                                    	<option value="SC">South Carolina</option>
                                    	<option value="SD">South Dakota</option>
                                    	<option value="TN">Tennessee</option>
                                    	<option value="TX">Texas</option>
                                    	<option value="UT">Utah</option>
                                    	<option value="VT">Vermont</option>
                                    	<option value="VA">Virginia</option>
                                    	<option value="WA">Washington</option>
                                    	<option value="WV">West Virginia</option>
                                    	<option value="WI">Wisconsin</option>
                                    	<option value="WY">Wyoming</option>
                                    </select>



                                    @if ($errors->has('state'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Phone </label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                <label for="zipcode" class="col-md-4 control-label">Zipcode </label>

                                <div class="col-md-6">
                                    <input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}" required autofocus>

                                    @if ($errors->has('zipcode'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('zipcode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                        <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>

                                    <a class='btn btn-danger' href='/charitys'>Cancel</a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
