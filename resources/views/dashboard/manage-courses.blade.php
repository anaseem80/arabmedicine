@extends('dashboard.layouts.layout')
@section('content-dashboard')
    @include('dashboard.layouts.navbar')
    <div class="dashboard-content-side">
        @include('dashboard.layouts.sidebar')
        <div class="dashboard-content-right-side">

            <div class="main-page-title bg-white fw-bold main-shadow p-4"><img
                    src="{{asset('images/SVG/view-apps.svg')}}" width="18" height="20" alt=""> Edit course
            </div>
            <div class="page-details mt-3">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form id="editCourseForm" action="{{route('course-update',$courseId->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="bg-white main-shadow py-4 px-5 border">
                        <h4 class="mb-4">Course Info</h4>
                        <div class="form-group">
                            <label for="cortitle">Course title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="cortitle" name="name"
                                   value="{{$courseId->name}}"
                                   placeholder="Enter Course Title" required>
                            @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="description" cols="30" name="description"
                                      rows="10">{{$courseId->description}}</textarea>
                            @error('description')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="bg-white main-shadow py-4 px-5 border my-4">
                        <h4 class="mb-4">Course Price</h4>
                        <div class="form-group">
                            <label for="price">Price <span class="text-danger">*</span></label>
                            <input type="text" class="form-control numeric" id="price" value="{{$courseId->price}}"
                                   placeholder="Enter Course Price" name="price">
                            <label for="freecou" class="mt-3">free <span class="text-danger">*</span></label>
                            <input type="checkbox" name="free" @if($courseId->free) checked @endif  id="freecou">
                            @error('price')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="bg-white main-shadow py-4 px-5 border my-4">
                        <h4 class="mb-4">Course thumbnail</h4>
                        <div class="form-group">
                            <label for="thumbnail">thumbnail <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control" id="thumbnail"
                                   placeholder="Enter Course Price" value="{{$courseId->image}}"
                                   required>
                            @error('image')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="bg-white main-shadow py-4 px-5 border">
                        <h4 class="mb-4">Lectures</h4>
                        <div class="buttons-lectures text-center mb-4">
                            <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#section">+ Add Section
                            </button>
                            @if(count($courseId->section ) > 0)
                                <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                        data-bs-target="#lectureadd">+ Add Lesson
                                </button>
                            @endif
                        </div>
                        <?php $sectionCount = 1; ?>
                        <?php $lectCount = 1; ?>
                        <?php $lessonCount = 1; ?>
                        <?php $index = 1; ?>

                        @foreach($courseId->section as $sec)
                            <div class="section-lecture bg-light mb-3 p-4">
                                <form class="remove" method="post" action="{{route('delete-section',$sec->id)}}">
                                    @csrf
                                </form>
                                <div class="position-relative">
                                    <p class="mb-4">Section {{$sectionCount++}}: <span
                                            class="fw-bold">lect {{$lectCount++}} ({{$sec ->section_name}})</span></p>
                                    <div class="section-butt position-absolute">
                                        <i class="fa fa-edit" data-bs-toggle="modal"
                                           data-bs-target="#section-{{$sec->id}}">
                                        </i>
                                        <!-- modal edit section here -->

                                        <div class="modal fade" id="section-{{$sec->id}}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Section</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('update-section' , $sec->id)}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="sectionnameedit">title <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"
                                                                       id="sectionnameedit"
                                                                       value="{{$sec->section_name}}"
                                                                       placeholder="Section Name" name="section_name"
                                                                       required>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- modal edit section here -->
                                        <i class="fa fa-times text-danger removesection">
                                            <form class="remove" method="post"
                                                  action="{{route('delete-section',$sec->id)}}">
                                                @csrf
                                            </form>
                                        </i>

                                    </div>
                                </div>
                                @foreach($sec ->lesson as $les)
                                    <div class="bg-white p-3 position-relative mb-3">
                                        {{--                                        <img src="{{asset('images/SVG/media-play.svg')}}" width="20" height="20" alt=""--}}
                                        {{--                                             style="cursor: pointer">--}}
                                        <img src="{{asset('images/SVG/media-play.svg')}}" width="20" height="20" alt=""
                                             style="cursor: pointer" data-bs-toggle="modal"
                                             data-bs-target="#video-{{$les->id}}">
                                        <span
                                            class="fw-bold">L{{$index++}} {{$les ->lesson_name}}</span>
                                        <div class="position-absolute lecture-butt">
                                            <i class="fa fa-edit" data-bs-toggle="modal"
                                               data-bs-target="#lesson-{{$les->id}}"></i>
                                            <i class="fa fa-times text-danger removeLesson">
                                                <form action="{{route('delete-lesson' , $les->id)}}" method="post"
                                                      class="remove">
                                                    @csrf
                                                </form>
                                            </i>

                                        </div>
                                        {{--                        modal video--}}
                                        <div class="modal fade" id="video-{{$les->id}}"
                                             aria-labelledby="exampleModalToggleLabel"
                                             tabindex="-1" aria-hidden="true"
                                             style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <iframe width="100%" height="315"
                                                                src="{{$les ->url}}"
                                                                title="YouTube video player" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen=""></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    {{--                        modal video--}}
                                    <!-- modal edit lesson here -->

                                        <div class="modal fade" id="lesson-{{$les->id}}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Lesson</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('update-lesson' , $les->id)}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="lessonnameedit">title <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"
                                                                       id="lessonnameedit" name="lesson_name"
                                                                       value="{{$les->lesson_name}}"
                                                                       placeholder="Lesson Name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sectionselect">Section <span
                                                                        class="text-danger">*</span></label>
                                                                <select name="section_id" id="sectionselect"
                                                                        class="form-control">

                                                                    @foreach($courseId->section as $sec)

                                                                        <option
                                                                            value="{{$sec ->id}}">{{$sec ->section_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- modal edit lesson here -->
                                    </div>

                                @endforeach
                            </div>
                        @endforeach


                    </div>
                    <button class="btn btn-primary w-100 mt-2 mb-4 editcourse" type="submit" id="editCourse">Edit
                        Course
                    </button>
                </form>

                <!-- modals here -->


                <!-- modal add section here -->

                <div class="modal fade" id="section" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('create-section')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{$courseId->id}}">
                                    <label for="sectionname">Section title <span class="text-danger">*</span></label>
                                    <input type="text" name="section_name" class="form-control" id="sectionname"
                                           placeholder="Section Name"
                                           required>
                                    @error('section_name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- modal add section here -->

                <!-- modal add lesson here -->


                <div class="modal fade" id="lectureadd" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Lesson</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('create-lesson')}}" method="post">
                                    @csrf
                                    {{--                                    <input type="hidden" name="section_id" value="{{$sec->id}}">--}}
                                    <div class="form-group">
                                        <label for="lessonname">Lesson title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="lesson_name" id="lessonname"
                                               placeholder="Lesson Name" required>
                                        @error('lesson_name')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="sectionselect">Section <span class="text-danger">*</span></label>
                                        <select name="section_id" id="sectionselect" class="form-control">
                                            @foreach($courseId->section as $sec)
                                                <option value="{{$sec ->id}}">{{$sec ->section_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="videourl">Video URL <span class="text-danger">*</span></label>
                                        <input type="text" name="url" class="form-control" id="videourl"
                                               placeholder="URL"
                                               required>
                                        @error('url')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="videourl">Duration <span class="text-danger">*</span></label>
                                        <input type="text" name="duration" class="form-control" id="duration"
                                               placeholder="Duration">
                                        @error('duration')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- modal add lesson here -->


                <!-- modals here -->
            </div>
        </div>
    </div>
@endsection

@section('page_js')
    <script src="{{asset('js/dashboard/course.js')}}"></script>
@endsection
