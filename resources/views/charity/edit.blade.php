@extends('layouts.app')

@section('title')
    Edit Charity
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Charity : <strong>{{ $charity->charity_name }}</strong></div>
                    <div class="panel-body">
                      <form class="form-horizontal" method='POST' action='/charitys/{{ $charity->id }}'>
                          {{ method_field('PUT') }}

                          {{ csrf_field() }}

                            <input name='id' value='{{ $charity->id }}' type='hidden'>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Charity Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $charity->charity_name) }}" required autofocus>

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
                                    <textarea id="description" name="description" rows="5" class="form-control">{{ old('description', $charity->charity_desc) }}</textarea>

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
                                    <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1', $charity->address1) }}" required autofocus>

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
                                    <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2', $charity->address2) }}" autofocus>

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
                                    <input id="city" type="text" class="form-control" name="city" value="{{ old('city', $charity->city) }}" required autofocus>

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

                                    <select id="state" class="form-control" name="state" required autofocus>
                                    	<option value="AL" @if( $charity->state == 'AL') selected = "selected" @endif >Alabama</option>
                                    	<option value="AK" @if( $charity->state == 'AK') selected = "selected" @endif >Alaska</option>
                                    	<option value="AZ" @if( $charity->state == 'AZ') selected = "selected" @endif >Arizona</option>
                                    	<option value="AR" @if( $charity->state == 'AR') selected = "selected" @endif >Arkansas</option>
                                    	<option value="CA" @if( $charity->state == 'CA') selected = "selected" @endif >California</option>
                                    	<option value="CO" @if( $charity->state == 'CO') selected = "selected" @endif >Colorado</option>
                                    	<option value="CT" @if( $charity->state == 'CT') selected = "selected" @endif >Connecticut</option>
                                    	<option value="DE" @if( $charity->state == 'DE') selected = "selected" @endif >Delaware</option>
                                    	<option value="DC" @if( $charity->state == 'DC') selected = "selected" @endif >District Of Columbia</option>
                                    	<option value="FL" @if( $charity->state == 'FL') selected = "selected" @endif >Florida</option>
                                    	<option value="GA" @if( $charity->state == 'GA') selected = "selected" @endif >Georgia</option>
                                    	<option value="HI" @if( $charity->state == 'HI') selected = "selected" @endif >Hawaii</option>
                                    	<option value="ID" @if( $charity->state == 'ID') selected = "selected" @endif >Idaho</option>
                                    	<option value="IL" @if( $charity->state == 'IL') selected = "selected" @endif >Illinois</option>
                                    	<option value="IN" @if( $charity->state == 'IN') selected = "selected" @endif >Indiana</option>
                                    	<option value="IA" @if( $charity->state == 'IA') selected = "selected" @endif >Iowa</option>
                                    	<option value="KS" @if( $charity->state == 'KS') selected = "selected" @endif >Kansas</option>
                                    	<option value="KY" @if( $charity->state == 'KY') selected = "selected" @endif >Kentucky</option>
                                    	<option value="LA" @if( $charity->state == 'LA') selected = "selected" @endif >Louisiana</option>
                                    	<option value="ME" @if( $charity->state == 'ME') selected = "selected" @endif >Maine</option>
                                    	<option value="MD" @if( $charity->state == 'MD') selected = "selected" @endif >Maryland</option>
                                    	<option value="MA" @if( $charity->state == 'MA') selected = "selected" @endif >Massachusetts</option>
                                    	<option value="MI" @if( $charity->state == 'MI') selected = "selected" @endif >Michigan</option>
                                    	<option value="MN" @if( $charity->state == 'MN') selected = "selected" @endif >Minnesota</option>
                                    	<option value="MS" @if( $charity->state == 'MS') selected = "selected" @endif >Mississippi</option>
                                    	<option value="MO" @if( $charity->state == 'MO') selected = "selected" @endif >Missouri</option>
                                    	<option value="MT" @if( $charity->state == 'MT') selected = "selected" @endif >Montana</option>
                                    	<option value="NE" @if( $charity->state == 'NE') selected = "selected" @endif >Nebraska</option>
                                    	<option value="NV" @if( $charity->state == 'NV') selected = "selected" @endif >Nevada</option>
                                    	<option value="NH" @if( $charity->state == 'NH') selected = "selected" @endif >New Hampshire</option>
                                    	<option value="NJ" @if( $charity->state == 'NJ') selected = "selected" @endif >New Jersey</option>
                                    	<option value="NM" @if( $charity->state == 'NM') selected = "selected" @endif >New Mexico</option>
                                    	<option value="NY" @if( $charity->state == 'NY') selected = "selected" @endif >New York</option>
                                    	<option value="NC" @if( $charity->state == 'NC') selected = "selected" @endif >North Carolina</option>
                                    	<option value="ND" @if( $charity->state == 'ND') selected = "selected" @endif >North Dakota</option>
                                    	<option value="OH" @if( $charity->state == 'OH') selected = "selected" @endif >Ohio</option>
                                    	<option value="OK" @if( $charity->state == 'OK') selected = "selected" @endif >Oklahoma</option>
                                    	<option value="OR" @if( $charity->state == 'OR') selected = "selected" @endif >Oregon</option>
                                    	<option value="PA" @if( $charity->state == 'PA') selected = "selected" @endif >Pennsylvania</option>
                                    	<option value="RI" @if( $charity->state == 'RI') selected = "selected" @endif >Rhode Island</option>
                                    	<option value="SC" @if( $charity->state == 'SC') selected = "selected" @endif >South Carolina</option>
                                    	<option value="SD" @if( $charity->state == 'SD') selected = "selected" @endif >South Dakota</option>
                                    	<option value="TN" @if( $charity->state == 'TN') selected = "selected" @endif >Tennessee</option>
                                    	<option value="TX" @if( $charity->state == 'TX') selected = "selected" @endif >Texas</option>
                                    	<option value="UT" @if( $charity->state == 'UT') selected = "selected" @endif >Utah</option>
                                    	<option value="VT" @if( $charity->state == 'VT') selected = "selected" @endif >Vermont</option>
                                    	<option value="VA" @if( $charity->state == 'VA') selected = "selected" @endif >Virginia</option>
                                    	<option value="WA" @if( $charity->state == 'WA') selected = "selected" @endif >Washington</option>
                                    	<option value="WV" @if( $charity->state == 'WV') selected = "selected" @endif >West Virginia</option>
                                    	<option value="WI" @if( $charity->state == 'WI') selected = "selected" @endif >Wisconsin</option>
                                    	<option value="WY" @if( $charity->state == 'WY') selected = "selected" @endif >Wyoming</option>
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
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone', $charity->phone1) }}" required autofocus>

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
                                    <input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ old('zipcode', $charity->zipcode) }}" required autofocus>

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

                                    <a class='btn btn-info' href='/charitys'>Cancel</a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
