@extends('frontend.index_master')
@section('frontend')
    <section class="basicPage ">
        <div class="conSection">
            <div class="container">
                <div class="sectionTitle">
                    <h3 class="">Edit an event</h3>
                    <div class="line"></div>
                    <p class="">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod</p>
                </div>
                <form action="{{ route('frontend.updateEvent') }}" class="createEventForm" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ encryptId(Auth::user()->id) }}">
                    <input type="hidden" name="id" value="{{ $eventDetails->id }}">

                    <div class="eventGrop">

                        <h2>Event Overview</h2>
                        <div class="formGrid">
                            <div class="">
                                <div class="inputGroup">
                                    <input type="text" placeholder=" " name="event_title" id="event_title"
                                        value="{{ $eventDetails->event_title }}">
                                    <label for="">Event Title</label>
                                </div>
                                <input type="hidden" name="event_id" value="{{ $eventDetails->id }}">


                                <div class="inputGroup">
                                    <select name="event_category" id="event_category">
                                        <option value=""disabled
                                            {{ $eventDetails->event_category == '' ? 'selected' : '' }}>Event
                                            Category</option>
                                        <option value="Music"
                                            {{ $eventDetails->event_category == 'Music' ? 'selected' : '' }}>Music
                                        </option>
                                        <option value="Business"
                                            {{ $eventDetails->event_category == 'Business' ? 'selected' : '' }}>
                                            Business</option>
                                        <option value="Food_&_Drinks"
                                            {{ $eventDetails->event_category == 'Food_&_Drinks' ? 'selected' : '' }}>Food &
                                            Drinks
                                        </option>
                                        <option value="Lunching"
                                            {{ $eventDetails->event_category == 'Lunching' ? 'selected' : '' }}>
                                            Lunching</option>
                                        <option value="Performing_&_Visual_Arts"
                                            {{ $eventDetails->event_category == 'Performing_&_Visual_Arts' ? 'selected' : '' }}>
                                            Performing & Visual Arts</option>
                                        <option value="Sports"
                                            {{ $eventDetails->event_category == 'Sports' ? 'selected' : '' }}>Sports
                                        </option>
                                    </select>
                                </div>

                                <div class="inputGroup">
                                    <textarea name="event_description" id="event_description">{{ $eventDetails->event_description }}</textarea>
                                    <label for="">About this event</label>
                                </div>

                            </div>
                            <div>
                                <div class="thumbnailCon">
                                    <label for="fileUpload" class="uploadButton"><i
                                            class="fa-solid fa-arrow-up-from-bracket"></i>Thumbnail Image</label>
                                    <input id="fileUpload" class="inputThumbnail" type="file" accept="image/*"
                                        name="event_thumbnail_image" onchange="previewImage(event)">
                                    <img id="preview" class="previewThumbnail"
                                        src="{{ Storage::url($eventDetails->event_thumbnail_image) }}
                                    ">
                                    <script>
                                        function previewImage(event) {
                                            const file = event.target.files[0];
                                            const reader = new FileReader();

                                            reader.onload = function() {
                                                const preview = document.getElementById('preview');
                                                preview.src = reader.result;
                                            }

                                            if (file) {
                                                reader.readAsDataURL(file);
                                            } else {
                                                preview.src = "";
                                            }
                                        }
                                    </script>
                                </div>

                                <div class="addEventImgGrid">
                                    <div id="imageUploadContainer">
                                        @foreach ($getEventGallery as $eventGallery)
                                            <div class="fileUploadCon" id="eventImage-{{ $eventGallery->id }}">
                                                <!-- Upload button for existing image -->
                                                <button class="fileUploadButton"><i
                                                        class="fa-solid fa-arrow-up-from-bracket"></i>Event Image</button>

                                                <!-- Input for uploading new images -->
                                                <input type="file" accept="image/*" name="event_gallery_image[]">

                                                <!-- Display the existing image -->
                                                <img id="imagePreview" class="imagePreview"
                                                    src="{{ Storage::url($eventGallery->event_gallery_image) }}"
                                                    alt="Image Preview" style="display: block;">

                                                <!-- Remove button to delete the existing image -->
                                                <button class="removeButton" data-image-id="{{ $eventGallery->id }}"><i
                                                        class="fas fa-times"></i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Remove button for existing images -->
                                    <button id="addImageButton">Add Event Image</button>

                                </div>
                                {{-- <script>
                                    let counter = 1;

                                    document.getElementById('addImageButton').addEventListener('click', function() {
                                        // Create a new eventImage section
                                        const newEventImage = document.createElement('div');
                                        newEventImage.classList.add('fileUploadCon');

                                        const newUploadButton = document.createElement('button');
                                        newUploadButton.classList.add('fileUploadButton');
                                        newUploadButton.innerHTML = '<i class="fa-solid fa-arrow-up-from-bracket"></i>Event image';

                                        const newInputFile = document.createElement('input');
                                        newInputFile.type = 'file';
                                        newInputFile.accept = 'image/*';
                                        newInputFile.required = true;
                                        newInputFile.name = 'event_gallery_image[' + counter +
                                            ']'; // Generate a unique name for each file input

                                        const newImagePreview = document.createElement('img');
                                        newImagePreview.classList.add('imagePreview');
                                        newImagePreview.style.display = 'none';

                                        const removeButton = document.createElement('button');
                                        removeButton.classList.add('removeButton');
                                        removeButton.innerHTML = '<i class="fas fa-times"></i>';

                                        // Append elements to the new eventImage section
                                        newEventImage.appendChild(newUploadButton);
                                        newEventImage.appendChild(newInputFile);
                                        newEventImage.appendChild(newImagePreview);
                                        newEventImage.appendChild(removeButton);

                                        // Append the new eventImage section to the container
                                        document.getElementById('imageUploadContainer').appendChild(newEventImage);

                                        // Increment the counter
                                        counter++;

                                        // Add event listeners
                                        newUploadButton.addEventListener('click', function() {
                                            newInputFile.click();
                                        });

                                        newInputFile.addEventListener('change', function(event) {
                                            const file = event.target.files[0];
                                            if (file) {
                                                const reader = new FileReader();
                                                reader.onload = function(e) {
                                                    newImagePreview.src = e.target.result;
                                                    newImagePreview.style.display = 'block';
                                                }
                                                reader.readAsDataURL(file);
                                            } else {
                                                newImagePreview.src = '';
                                                newImagePreview.style.display = 'none';
                                            }
                                        });
                                        // Function to add the remove button logic
                                        function handleRemoveButton(removeButton, container) {
                                            removeButton.addEventListener('click', function() {
                                                container.remove();
                                            });
                                        }

                                        removeButton.addEventListener('click', function() {
                                            newEventImage.remove();
                                        });
                                    });
                                </script> --}}
                                <script>
                                    let counter = {{ count($getEventGallery) }}; // Start the counter based on the number of existing images

                                    // Add functionality to dynamically add new image upload fields
                                    document.getElementById('addImageButton').addEventListener('click', function() {
                                        const newEventImage = document.createElement('div');
                                        newEventImage.classList.add('fileUploadCon');

                                        const newUploadButton = document.createElement('button');
                                        newUploadButton.classList.add('fileUploadButton');
                                        newUploadButton.innerHTML = '<i class="fa-solid fa-arrow-up-from-bracket"></i>Event image';

                                        const newInputFile = document.createElement('input');
                                        newInputFile.type = 'file';
                                        newInputFile.accept = 'image/*';
                                        newInputFile.required = true;
                                        newInputFile.name = 'event_gallery_image[' + counter + ']'; // Assign unique name to each file input

                                        const newImagePreview = document.createElement('img');
                                        newImagePreview.classList.add('imagePreview');
                                        newImagePreview.style.display = 'none';

                                        const removeButton = document.createElement('button');
                                        removeButton.classList.add('removeButton');
                                        removeButton.innerHTML = '<i class="fas fa-times"></i>';

                                        // Append all elements to the new image container
                                        newEventImage.appendChild(newUploadButton);
                                        newEventImage.appendChild(newInputFile);
                                        newEventImage.appendChild(newImagePreview);
                                        newEventImage.appendChild(removeButton);

                                        // Append the newly created image container to the parent div
                                        document.getElementById('imageUploadContainer').appendChild(newEventImage);

                                        // Increment the counter for unique input names
                                        counter++;

                                        // Handle file input change to display the image preview
                                        newUploadButton.addEventListener('click', function() {
                                            newInputFile.click();
                                        });

                                        newInputFile.addEventListener('change', function(event) {
                                            const file = event.target.files[0];
                                            if (file) {
                                                const reader = new FileReader();
                                                reader.onload = function(e) {
                                                    newImagePreview.src = e.target.result;
                                                    newImagePreview.style.display = 'block';
                                                }
                                                reader.readAsDataURL(file);
                                            } else {
                                                newImagePreview.src = '';
                                                newImagePreview.style.display = 'none';
                                            }
                                        });

                                        // Add the remove functionality for dynamically added images
                                        removeButton.addEventListener('click', function() {
                                            newEventImage.remove();
                                        });
                                    });

                                    // Handle removal of existing images from the backend
                                    document.querySelectorAll('.removeButton').forEach(button => {
                                        button.addEventListener('click', function() {
                                            const imageId = this.getAttribute('data-image-id');
                                            if (imageId) {
                                                // Make an AJAX request to delete the image
                                                fetch(`/delete-event-image/${imageId}`, {
                                                    method: 'DELETE',
                                                    headers: {
                                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                        'Content-Type': 'application/json'
                                                    }
                                                }).then(response => {
                                                    if (response.ok) {
                                                        // Remove the image from the DOM after successful deletion
                                                        document.getElementById(`eventImage-${imageId}`).remove();
                                                    } else {
                                                        console.error('Failed to delete image');
                                                    }
                                                }).catch(error => console.error('Error:', error));
                                            }
                                        });
                                    });
                                </script>




                            </div>

                        </div>
                    </div>
                    <div class="eventGrop">
                        <h2>Date and Time</h2>
                        <div class="dateItimeGrid">
                            <div class="inputGroup">
                                <input type="date" name="event_date" value="{{ $eventDetails->event_date }}">
                                <label for="">Event Date</label>
                            </div>
                            <div class="inputGroup">
                                <input type="time" name="event_start_time"
                                    value="{{ $eventDetails->event_start_time }}">
                                <label for="">Start Time</label>
                            </div>
                            <div class="inputGroup">
                                <input type="time" name="event_end_time" value="{{ $eventDetails->event_end_time }}">
                                <label for="">End Time</label>
                            </div>
                        </div>
                    </div>
                    <div class="eventGrop">
                        <h2>Event Location</h2>
                        <div class="locationType">
                            <div class="radio">
                                <input type="radio" id="venue" name="event_location"
                                    value="Venue"{{ $eventDetails->event_location == 'Venue' ? 'checked' : '' }}>
                                <label for="venue"><i class="fa-solid fa-location-dot"></i>Venue</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="online" name="event_location"
                                    value="Online Event"{{ $eventDetails->event_location == 'Online Event' ? 'checked' : '' }}>
                                <label for="online"><i class="fa-solid fa-clapperboard"></i>Online Event</label>
                            </div>
                        </div>
                        <div class="vanueCon">
                            <div class="vanueConGrid">
                                <div class="inputGroup">
                                    <input type="text" placeholder=" " name="event_venue"
                                        value="{{ $eventDetails?->event_venue }}">
                                    <label for="">Location</label>
                                </div>
                                <div class="inputGroup">
                                    <input type="text" placeholder=" " name="event_venue_name"
                                        value="{{ $eventDetails?->event_venue_name }}">
                                    <label for="">Venue Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="onlineCon">
                            <div class="inputGroup">
                                <input type="url" placeholder=" " name="event_online_link"
                                    value="{{ $eventDetails?->event_online_link }}">
                                <label for="">Live Streaming Link</label>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const venueRadio = document.getElementById('venue');
                                const onlineRadio = document.getElementById('online');
                                const vanueCon = document.querySelector('.vanueCon');
                                const onlineCon = document.querySelector('.onlineCon');

                                function toggleContent() {
                                    if (venueRadio.checked) {
                                        vanueCon.style.display = 'block';
                                        onlineCon.style.display = 'none';
                                    } else if (onlineRadio.checked) {
                                        vanueCon.style.display = 'none';
                                        onlineCon.style.display = 'block';
                                    }
                                }

                                // Initial toggle to set the correct state on page load
                                toggleContent();

                                // Add event listeners to the radio buttons
                                venueRadio.addEventListener('change', toggleContent);
                                onlineRadio.addEventListener('change', toggleContent);
                            });
                        </script>

                    </div>
                    <div class="eventGrop">
                        <h2>Event Ticket</h2>

                        <div class="inputGroup">
                            <input type="number" placeholder="" class="priceInput" name="event_ticket_cost"
                                value="{{ $eventDetails?->event_ticket_cost }}">
                            <label for="">Price</label>
                        </div>
                        <div class="ticketConGrid">
                            <div class="inputGroup">
                                <input type="number" placeholder="" name="event_slot_no"
                                    value="{{ $eventDetails?->event_slot_no }}">
                                <label for="">Number of Slot</label>
                            </div>
                            <div class="inputGroup">
                                <input type="number" placeholder="" class="priceInput" name="event_freepass_no"
                                    value="{{ $eventDetails->event_free_pass }}">
                                <label for="">Number of Free Passes</label>
                            </div>
                        </div>


                        <label class="switch">
                            <input type="checkbox"
                                value="Free"{{ $eventDetails->event_ticket_type == 'Free' ? 'checked' : '' }}
                                name="event_ticket_type" id="freeTicketCheckbox">
                            <div class="slider">
                                <div class="circle">
                                    <svg class="cross" xml:space="preserve" style="enable-background:new 0 0 512 512"
                                        viewBox="0 0 365.696 365.696" y="0" x="0" height="6" width="6"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path data-original="#000000" fill="currentColor"
                                                d="M243.188 182.86 356.32 69.726c12.5-12.5 12.5-32.766 0-45.247L341.238 9.398c-12.504-12.503-32.77-12.503-45.25 0L182.86 122.528 69.727 9.374c-12.5-12.5-32.766-12.5-45.247 0L9.375 24.457c-12.5 12.504-12.5 32.77 0 45.25l113.152 113.152L9.398 295.99c-12.503 12.503-12.503 32.769 0 45.25L24.48 356.32c12.5 12.5 32.766 12.5 45.247 0l113.132-113.132L295.99 356.32c12.503 12.5 32.769 12.5 45.25 0l15.081-15.082c12.5-12.504 12.5-32.77 0-45.25zm0 0">
                                            </path>
                                        </g>
                                    </svg>
                                    <svg class="checkmark" xml:space="preserve" style="enable-background:new 0 0 512 512"
                                        viewBox="0 0 24 24" y="0" x="0" height="10" width="10"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path class="" data-original="#000000" fill="currentColor"
                                                d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <span>My Tickets are Free</span>
                        </label>
                        <script>
                            document.getElementById('freeTicketCheckbox').addEventListener('change', function() {
                                var priceInputs = document.querySelectorAll('.priceInput');
                                priceInputs.forEach(function(priceInput) {
                                    if (this.checked) {
                                        priceInput.disabled = true;
                                        priceInput.value = ''; // Clear the input field when disabled
                                    } else {
                                        priceInput.disabled = false;
                                    }
                                }, this);
                            });
                        </script>
                    </div>

                    <div class="createEventFooter">
                        <a href="/">Exit</a>
                        <input type="submit" value="Update Event" name="submit" class="submit">
                    </div>


                </form>
            </div>

        </div>
    </section>
@endsection
