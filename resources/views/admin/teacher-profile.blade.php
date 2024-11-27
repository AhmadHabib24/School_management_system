@extends('layout.teacherlayout')
@section('title', 'Profile')
@section('body')
    <div class="container">
        <div class="card custom-card">
            <div class="card-body">
                <h2 class="text-center title">Teacher Profile</h2>
                <center>
                    <div class="row">
                        <div class="col-12">
                            <div class="circle">
                                <img class="profile-pic"
                                    src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg">

                            </div>
                            <div class="p-image">
                                <img src="{{asset('images/img.png')}}" class="upload-button" alt="">
                                <input class="file-upload" type="file" accept="image/*" />
                            </div>
                        </div>
                    </div>
                </center>

                <form id="teacherProfileForm" action="{{ route('teacher.profile.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- Name Field -->
                    <div class="form-group custom-form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mt-2 @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" placeholder="Enter your Name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Instructor Nickname Field -->
                    <div class="form-group mt-3 custom-form-group">
                        <label for="nickname">Instructor Nickname</label>
                        <input type="text" class="form-control mt-2 @error('nick_name') is-invalid @enderror"
                            id="nickname" name="nick_name" value="{{ old('nick_name') }}" placeholder="Enter nickname">
                        @error('nick_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Country of Residence Select -->
                    <div class="container my-5">
                        <div class="tag-select-container w-100">
                            <label for="countryInput" class="form-label">Country of Residence</label>
                            <div class="tag-input-wrapper" id="countryInputWrapper">
                                <input type="text" id="countryInput"
                                    class="tag-input @error('country') is-invalid @enderror" name="country"
                                    placeholder="Add tags..." value="{{ old('country') }}">
                            </div>
                            <div class="tag-dropdown" id="countryDropdown">
                                <!-- Tag options with radio buttons -->
                                <div class="tag-options">
                                    <div class="custom-radio">
                                        <input type="radio" id="radio1" class="me-5" id="tagLively" value="Lively" name="countryTag">
                                        <label class="me-2" for="radio1"></label>
                                      </div>
                                    
                                    <label for="tagPatience">Kenya</label>
                                </div>
                                <div class="tag-options">
                                    <div class="custom-radio">
                                        <input type="radio" id="radio1" class="me-5" id="tagTalkative" value="Talkative" name="countryTag">
                                        <label class="me-2" for="radio1"></label>
                                      </div>
                                    
                                    <label for="tagPatience">Armenia</label>
                                   
                                </div>
                                <div class="tag-options">
                                    <div class="custom-radio">
                                        <input type="radio" id="radio1" class="me-5" id="tagPatience" value="Patience" name="countryTag">
                                        <label class="me-2" for="radio1"></label>
                                      </div>
                                    
                                    <label for="tagPatience">Japan</label>
                                </div>
                            </div>
                            @error('country')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- License and Certificate Upload -->
                    <div class="form-group mt-3 custom-form-group">
                        <label for="certificate">License and Certificate</label>
                        <div class="file-upload-box">
                            <img src="{{ asset('images/inputimg.png') }}" alt="Upload Icon" class="upload-icon" />
                            <input type="file"
                                class="form-control-file custom-file-input @error('certificate') is-invalid @enderror"
                                id="certificate" name="certificate" accept="image/*" multiple
                                onchange="previewFiles(event)" />
                        </div>
                        @error('certificate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div id="preview-container" class="preview-container"></div>
                    </div>

                    <!-- About Me Textarea -->
                    <div class="form-group mt-3 custom-form-group">
                        <label for="aboutMe">About Me</label>
                        <textarea class="form-control mt-2 custom-input @error('about_me') is-invalid @enderror" id="aboutMe" name="about_me"
                            rows="3" placeholder="Enter details about yourself...">{{ old('about_me') }}</textarea>
                        @error('about_me')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Class Strength Dropdown -->
                    <div class="form-group mt-3 custom-form-group">
                        <label for="classStrength">Class Strength</label>
                        <select class="form-control mt-2 custom-input @error('class_strength') is-invalid @enderror"
                            id="classStrength" name="class_strength">
                            <option value="">Select</option>
                            <option value="1-10" @selected(old('class_strength') == '1-10')>1-10</option>
                            <option value="11-20" @selected(old('class_strength') == '11-20')>11-20</option>
                            <option value="21-30" @selected(old('class_strength') == '21-30')>21-30</option>
                        </select>
                        @error('class_strength')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Teaching Style Tags -->
                    <div class="container my-5">
                        <div class="tag-select-container w-100">
                            <label for="tagInput" class="form-label">Teaching Style</label>
                            <div class="tag-input-wrapper" id="tagInputWrapper">
                                <input type="text" id="tagInput"
                                    class="tag-input @error('teaching_style') is-invalid @enderror" name="teaching_style[]"
                                    placeholder="Add tags..." value="{{ old('teaching_style') }}">
                            </div>
                            <div class="tag-dropdown" id="tagDropdown">
                                <!-- Tag options -->
                                <div class="tag-option" data-tag="Select">Select</div>
                                <div class="tag-option" data-tag="Traditional">Traditional</div>
                                <div class="tag-option" data-tag="Interactive">Interactive</div>
                                <div class="tag-option" data-tag="Collaborative">Collaborative</div>
                            </div>
                            @error('teaching_style')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit and Save Buttons -->
                    <div class="button-group">
                        <a href="{{route('teacher-dashboard')}}" class="btn custom-btn btn-secondary">Skip</a>
                        <button type="submit" class="btn custom-btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function previewFiles(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = ''; // Clear previous previews

            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewItem = document.createElement('div');
                    previewItem.className = 'preview-item';

                    const img = document.createElement('img');
                    img.src = e.target.result;

                    const removeBtn = document.createElement('button');
                    removeBtn.className = 'remove-btn';
                    removeBtn.innerHTML = '×';
                    removeBtn.onclick = function() {
                        previewItem.remove();
                    };

                    previewItem.appendChild(img);
                    previewItem.appendChild(removeBtn);
                    previewContainer.appendChild(previewItem);
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
    <script>
        $(document).ready(function() {


            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function() {
                readURL(this);
            });

            $(".upload-button").on('click', function() {
                $(".file-upload").click();
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // First Select Menu Logic
            const countryInput = document.getElementById("countryInput");
            const countryDropdown = document.getElementById("countryDropdown");
            const countryInputWrapper = document.getElementById("countryInputWrapper");
            let countrySelectedTag = null;

            countryInput.addEventListener("focus", () => {
                countryDropdown.style.display = "block";
            });

            document.addEventListener("click", (e) => {
                if (!countryInputWrapper.contains(e.target)) {
                    countryDropdown.style.display = "none";
                }
            });

            document.querySelectorAll("#countryDropdown .tag-options").forEach(option => {
                const radioInput = option.querySelector("input[type='radio']");

                option.addEventListener("click", () => {
                    const tag = radioInput.value;
                    if (countrySelectedTag) {
                        const existingPill = document.querySelector(
                            `.tag-pill[data-tag="${countrySelectedTag}"]`);
                        if (existingPill) {
                            existingPill.remove();
                        }
                    }

                    const tagPill = document.createElement("div");
                    tagPill.className = "tag-pill";
                    tagPill.dataset.tag = tag;
                    tagPill.innerHTML = `${tag} <button class="close-btn">&times;</button>`;
                    countryInputWrapper.insertBefore(tagPill, countryInput);

                    radioInput.checked = true;
                    countrySelectedTag = tag;

                    tagPill.querySelector(".close-btn").addEventListener("click", () => {
                        tagPill.remove();
                        radioInput.checked = false;
                        countrySelectedTag = null;
                    });

                    countryInput.value = "";
                    countryDropdown.style.display = "none";
                });
            });

            countryInput.addEventListener("input", () => {
                const query = countryInput.value.toLowerCase();
                document.querySelectorAll("#countryDropdown .tag-option").forEach(option => {
                    const label = option.querySelector("label");
                    if (label && label.textContent.toLowerCase().includes(query)) {
                        option.style.display = "block";
                    } else {
                        option.style.display = "none";
                    }
                });
            });

            // Second Select Menu Logic
            const tagInput = document.getElementById("tagInput");
            const tagDropdown = document.getElementById("tagDropdown");
            const tagInputWrapper = document.getElementById("tagInputWrapper");
            const selectedTags = [];

            tagInput.addEventListener("focus", () => {
                tagDropdown.style.display = "block";
            });

            document.addEventListener("click", (e) => {
                if (!tagInputWrapper.contains(e.target)) {
                    tagDropdown.style.display = "none";
                }
            });

            function addTag(tag) {
                if (!selectedTags.includes(tag)) {
                    selectedTags.push(tag);

                    const tagPill = document.createElement("div");
                    tagPill.className = "tag-pill";
                    tagPill.innerHTML = `${tag} <button class="close-btn">&times;</button>`;
                    tagInputWrapper.insertBefore(tagPill, tagInput);

                    tagPill.querySelector(".close-btn").addEventListener("click", () => {
                        tagInputWrapper.removeChild(tagPill);
                        selectedTags.splice(selectedTags.indexOf(tag), 1);
                        updateDropdown();
                    });

                    updateDropdown();
                }
                tagInput.value = "";
            }

            document.querySelectorAll("#tagDropdown .tag-option").forEach(option => {
                option.addEventListener("click", () => {
                    const tag = option.dataset.tag;
                    addTag(tag);
                });
            });

            function updateDropdown() {
                document.querySelectorAll("#tagDropdown .tag-option").forEach(option => {
                    if (selectedTags.includes(option.dataset.tag)) {
                        option.classList.add("selected");
                    } else {
                        option.classList.remove("selected");
                    }
                });
            }

            tagInput.addEventListener("input", () => {
                const query = tagInput.value.toLowerCase();
                document.querySelectorAll("#tagDropdown .tag-option").forEach(option => {
                    if (option.dataset.tag.toLowerCase().includes(query)) {
                        option.style.display = "block";
                    } else {
                        option.style.display = "none";
                    }
                });
            });
        });
    </script> 

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Form validation and submission handler
            document.getElementById("teacherProfileForm").addEventListener("submit", function(e) {
                e.preventDefault();

                // Example validation check for required fields
                const nameField = document.getElementById("name");
                if (nameField.value.trim() === "") {
                    alert("Name is required");
                    nameField.focus();
                    return;
                }

                // Handle form submission
                alert("Form submitted successfully!");
            });

            // Tag input simulation
            let tagsInput = document.getElementById("tags");
            tagsInput.addEventListener("keypress", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    addTag(tagsInput.value);
                    tagsInput.value = "";
                }
            });

            function addTag(tag) {
                if (tag.trim() !== "") {
                    let tagContainer = document.createElement("span");
                    tagContainer.className = "badge badge-primary mr-1";
                    tagContainer.innerText = tag;
                    tagsInput.parentNode.insertBefore(tagContainer, tagsInput);
                }
            }
        });
    </script>
@endsection
