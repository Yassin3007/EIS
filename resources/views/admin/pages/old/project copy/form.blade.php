@extends('admin.layouts.main')
@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>{{ $project->id ? 'Edit' : 'Add' }} Project</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Projects</a></li>
        <li class="breadcrumb-item active">Project Form</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card card-create">
        <div class="card-header">
          <h3 class="card-title">{{ $project->id ? 'Edit' : 'Add' }} Project</h3>
        </div>
        <div class="card-body">
          <form action="{{ $project->id ? route('project.update', $project->id) : route('project.store') }}"
                method="POST" enctype="multipart/form-data">
            @csrf
            @if ($project->id)
              @method('put')
            @endif
            <div class="row">


              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>location English <span class="required_class">*</span></label>
                  <input type="text" name="location_en" maxlength="90"
                         value="{{ $project->location_en ?? old('location_en') }}" class="form-control"
                         placeholder="Enter ..." required>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>location Arabic <span class="required_class">*</span></label>
                  <input type="text" name="location_ar" maxlength="90"
                         value="{{ $project->location_ar ?? old('location_ar') }}" class="form-control"
                         placeholder="Enter ..." required>
                </div>
              </div>


              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>units types <span class="required_class">*</span></label>
                  <select class="ui fluid search dropdown" multiple="">
                    <option value="">State</option>
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
                </div>
              </div>


              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Name English <span class="required_class">*</span></label>
                  <input type="text" name="name_en" maxlength="90"
                         value="{{ $project->name_en ?? old('name_en') }}" class="form-control"
                         placeholder="Enter ..." required>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Name Arabic <span class="required_class">*</span></label>
                  <input type="text" name="name_ar" maxlength="90"
                         value="{{ $project->name_ar ?? old('name_ar') }}" class="form-control"
                         placeholder="Enter ..." required>
                </div>
              </div>

              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Description English <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="description_en"
                            required>{{ $project->description_en ?? old('description_en') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Description Arabic <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="description_ar"
                            required>{{ $project->description_ar ?? old('description_ar') }}</textarea>
                </div>
              </div>

              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>details English <span class="required_class">Press enter after every line to work as a list*</span> </label>
                  <textarea rows="5" class="form-control" name="details_en"
                            required>{{ $project->details_en ?? old('details_en') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>details Arabic <span class="required_class"> Press enter after every line to work as a list *</span> </label>
                  <textarea rows="5" class="form-control" name="details_ar"
                            required>{{ $project->details_ar ?? old('details_ar') }}</textarea>
                </div>
              </div>

              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label class="my-3">left figur Images ALT EN <span class="required_class">*</span></label>
                  <input type="text" name="left_figur_alt_en" maxlength="90"
                         value="{{ $project->projectImages('left_figur')->first()->alt_en ?? old('left_figur_alt_en') }}"
                         class="form-control" required>
                </div>
              </div>


              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label class="my-3">left figur Images ALT ar <span class="required_class">*</span></label>
                  <input type="text" name="left_figur_alt_ar" maxlength="90"
                         value="{{ $project->projectImages('left_figur')->first()->alt_ar ?? old('left_figur_alt_ar') }}"
                         class="form-control" required>
                </div>
              </div>


              <div class="col-sm-12">
                @error('left_figur')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label class="my-3"> project left figur <span class="required_class">*  Max Image size is 5M</span></label>
                  @include('admin.pages.commonWidgets.dropzone_for_single_Image',['inputName'=>'left_figur'])
                  <div class="input-group">
                    <div class="custom-file">

                    </div>
                  </div>

                  @if (count($project->projectImages('left_figur')))
                    <div class="form-group">
                      <label class="my-3">project left figur </label>
                      <div class="d-flex flex-wrap ">
                        @foreach ($project->projectImages('left_figur') as $image)
                          <div id="{{$image->id}}" class="image_container">
                            <img src="{{$image->full_url}}">
                            <button type="button" class="btn remove">Remove</button>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  @endif
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Left Figure Description English <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="left_figure_details_en"
                            required>{{ $project->left_figure_details_en ?? old('left_figure_details_en') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Left Figure Description Arabic <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="left_figure_details_ar"
                            required>{{ $project->left_figure_details_ar ?? old('left_figure_details_ar') }}</textarea>
                </div>
              </div>

              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>center figure Image ALT EN <span class="required_class">*</span></label>
                  <input type="text" name="center_figur_alt_en" maxlength="90"
                         value="{{ $project->projectImages('center_figur')->first()->alt_en ?? old('center_figur_alt_en') }}"
                         class="form-control" required>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>center figure Images ALT ar <span class="required_class">*</span></label>
                  <input type="text" name="center_figur_alt_ar" maxlength="90"
                         value="{{ $project->projectImages('center_figur')->first()->alt_ar ?? old('center_figur_alt_ar') }}"
                         class="form-control" required>
                </div>
              </div>

              <div class="col-sm-12">
                @error('center_figur')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <!-- <input type="file"  name="center_figur"  class="form-control" placeholder="Enter ..." {{$project->projectImages('center_figur')?'':'required'}}> -->
                <div class="form-group">
                  <label for="exampleInputFile"> project center figur <span class="required_class">*</span></label>
                  @include('admin.pages.commonWidgets.dropzone_for_single_Image',['inputName'=>'center_figur'])
                  <div class="input-group">
                    <div class="custom-file">

                    </div>
                  </div>

                  @if (count($project->projectImages('center_figur')))
                    <div class="form-group">
                      <label class="my-3">project center figur </label>
                      <div class="d-flex flex-wrap ">
                        @foreach ($project->projectImages('center_figur') as $image)
                          <div id="{{$image->id}}" class="image_container">
                            <img src="{{$image->full_url}}">
                            <button type="button" class="btn remove">Remove</button>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  @endif
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Center Figure Description English <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="center_figure_details_en"
                            required>{{ $project->center_figure_details_en ?? old('center_figure_details_en') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Center Figure Description Arabic <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="center_figure_details_ar"
                            required>{{ $project->center_figure_details_ar ?? old('center_figure_details_ar') }}</textarea>
                </div>
              </div>

              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>right figur Images ALT EN <span class="required_class">*</span></label>
                  <input type="text" name="right_figur_alt_en" maxlength="90"
                         value="{{ $project->projectImages('right_figur')->first()->alt_en ?? old('right_figur_alt_en') }}"
                         class="form-control" required>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>right figur Images ALT ar <span class="required_class">*</span></label>
                  <input type="text" name="right_figur_alt_ar" maxlength="90"
                         value="{{ $project->projectImages('right_figur')->first()->alt_ar ?? old('right_figur_alt_ar') }}"
                         class="form-control" required>
                </div>
              </div>
              <div class="col-sm-12">
                @error('right_figur')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="exampleInputFile"> project right figur <span
                      class="required_class">*</span></label>
                  @include('admin.pages.commonWidgets.dropzone_for_single_Image',['inputName'=>'right_figur'])
                  <div class="input-group">
                    <div class="custom-file">
                    </div>
                  </div>
                  @if (count($project->projectImages('right_figur')))
                    <div class="form-group">
                      <label class="my-3">project right_figur </label>
                      <div class="d-flex flex-wrap ">
                        @foreach ($project->projectImages('right_figur') as $image)
                          <div id="{{ $image->id }}" class="image_container">
                            <img src="{{ $image->full_url }}">
                            <button type="button" class="btn remove">Remove</button>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  @endif
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Right Figure Description English <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="right_figure_details_en"
                            required>{{ $project->right_figure_details_en ?? old('right_figure_details_en') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Right Figure Description Arabic <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="right_figure_details_ar"
                            required>{{ $project->right_figure_details_ar ?? old('right_figure_details_ar') }}</textarea>
                </div>
              </div>

              <div class="col-sm-12">
                @error('images')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label>Project Images <span class="required_class">displays in project slider*</span>
                </label>
                @include('admin.pages.commonWidgets.dropzone')

                @if (count($project->projectImages('project')))
                  <div class="form-group">
                    <label class="my-3">Project Images</label>
                    <div class="d-flex flex-wrap ">
                      @foreach ($project->projectImages('project') as $image)
                        <div id="{{ $image->id }}" class="image_container">
                          <img src="{{ $image->full_url }}">
                          <button type="button" class="btn remove">Remove</button>
                        </div>
                      @endforeach
                    </div>
                  </div>
                @endif
              </div>

              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Project Images ALT EN <span class="required_class">*</span></label>
                  <input type="text" name="project_alt_en" maxlength="90"
                         value="{{ $project->projectImages('project')->first()->alt_en ?? old('project_alt_en') }}"
                         class="form-control" required>
                </div>
              </div>

              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Project Images ALT ar <span class="required_class">*</span></label>
                  <input type="text" name="project_alt_ar" maxlength="90"
                         value="{{ $project->projectImages('project')->first()->alt_ar?? old('project_alt_ar') }}"
                         class="form-control" required>
                </div>
              </div>

              {{-- @seoForm($project) --}}
            </div>
            <div class="images-inputs-container">
            </div>
            <button class="form-control btn btn-success custom-submit_button" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('page_level_js')
  {{-- @include('admin') --}}
  @include('admin.pages.commonWidgets.dropzone-script')
  <script>
    $('.remove').click(function () {
      var id = $(this).parents('div').attr('id')
      swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '{{ url('/dashboard/image/delete/') }}' + '/' + id,
            type: 'Post',
            error: function () {
              swal.fire({
                title: 'Something is wrong',
                icon: 'error'
              })
            },
            success: function (data) {
              $('#' + id).remove()
              swal.fire({
                title: 'Deleted!',
                icon: 'success'
              })
            }
          })
        }
      })
    })
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
  </script>
@endsection
