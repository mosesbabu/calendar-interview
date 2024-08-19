<?php
$page        = 'dashboard';
$header_name = 'Home';

require_once 'header.php';
?>

<style data-fullcalendar=""></style>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card app-calendar-wrapper">
        <div class="row g-0">
            <!-- Calendar Sidebar -->
            <div class="col app-calendar-sidebar border-end" id="app-calendar-sidebar">
                <div class="border-bottom p-6 my-sm-0 mb-4">
                    <button class="btn btn-primary btn-toggle-sidebar w-100" data-bs-toggle="offcanvas" data-bs-target="#addEventSidebar" aria-controls="addEventSidebar">
                        <i class="bx bx-plus bx-16px me-2"></i>
                        <span class="align-middle">Add Event</span>
                    </button>
                </div>
                <div class="px-3 pt-2">
                    <!-- inline calendar (flatpicker) -->
                    <div class="inline-calendar"></div>
                </div>
                <hr class="mb-6 mx-n4 mt-3" />
                <div class="px-6 pb-2">
                    <!-- Filter -->
                    <div>
                        <h5>Event Filters</h5>
                    </div>

                    <div class="form-check form-check-secondary mb-5 ms-2">
                        <input class="form-check-input select-all" type="checkbox" id="selectAll" data-value="all" checked />
                        <label class="form-check-label" for="selectAll">View All</label>
                    </div>

                    <div class="app-calendar-events-filter text-heading">
                        <div class="form-check form-check-danger mb-5 ms-2">
                            <input class="form-check-input input-filter" type="checkbox" id="select-personal" data-value="personal" checked />
                            <label class="form-check-label" for="select-personal">Personal</label>
                        </div>
                        <div class="form-check mb-5 ms-2">
                            <input class="form-check-input input-filter" type="checkbox" id="select-business" data-value="business" checked />
                            <label class="form-check-label" for="select-business">Business</label>
                        </div>
                        <div class="form-check form-check-warning mb-5 ms-2">
                            <input class="form-check-input input-filter" type="checkbox" id="select-family" data-value="family" checked />
                            <label class="form-check-label" for="select-family">Family</label>
                        </div>
                        <div class="form-check form-check-success mb-5 ms-2">
                            <input class="form-check-input input-filter" type="checkbox" id="select-holiday" data-value="holiday" checked />
                            <label class="form-check-label" for="select-holiday">Holiday</label>
                        </div>
                        <div class="form-check form-check-info ms-2">
                            <input class="form-check-input input-filter" type="checkbox" id="select-etc" data-value="etc" checked />
                            <label class="form-check-label" for="select-etc">ETC</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Calendar Sidebar -->

            <!-- Calendar & Modal -->
            <div class="col app-calendar-content">
                <div class="card shadow-none border-0">
                    <div class="card-body pb-0">
                        <!-- FullCalendar -->
                        <div id="calendar"></div>
                    </div>
                </div>
                <div class="app-overlay"></div>
                <!-- FullCalendar Offcanvas -->
                <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="addEventSidebar" aria-labelledby="addEventSidebarLabel">
                    <div class="offcanvas-header border-bottom">
                        <h5 class="offcanvas-title" id="addEventSidebarLabel">Add Event</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form class="event-form pt-0" id="eventForm" method="post">
                            <div class="mb-6">
                                <label class="form-label" for="eventTitle">Title</label>
                                <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Event Title" />
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="eventLabel">Label</label>
                                <select class="select2 select-event-label form-select" id="eventLabel" name="eventLabel">
                                    <option data-label="primary" value="Business" selected>
                                        Business
                                    </option>
                                    <option data-label="danger" value="Personal">Personal</option>
                                    <option data-label="warning" value="Family">Family</option>
                                    <option data-label="success" value="Holiday">Holiday</option>
                                    <option data-label="info" value="ETC">ETC</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="eventStartDate">Start Date</label>
                                <input type="text" class="form-control" id="eventStartDate" name="eventStartDate" placeholder="Start Date" />
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="eventEndDate">End Date</label>
                                <input type="text" class="form-control" id="eventEndDate" name="eventEndDate" placeholder="End Date" />
                            </div>
                            <div class="mb-6">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input allDay-switch" id="allDaySwitch" />
                                    <label class="form-check-label" for="allDaySwitch">All Day</label>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="eventURL">Event URL</label>
                                <input type="url" class="form-control" id="eventURL" name="eventURL" placeholder="https://www.google.com" />
                            </div>
                            <div class="mb-4 select2-primary">
                                <label class="form-label" for="eventGuests">Add Guests</label>
                                <select class="select2 select-event-guests form-select" id="eventGuests" name="eventGuests" multiple>
                                    <option data-avatar="1.png" value="Jane Foster">
                                        Jane Foster
                                    </option>
                                    <option data-avatar="3.png" value="Donna Frank">
                                        Donna Frank
                                    </option>
                                    <option data-avatar="5.png" value="Gabrielle Robertson">
                                        Gabrielle Robertson
                                    </option>
                                    <option data-avatar="7.png" value="Lori Spears">
                                        Lori Spears
                                    </option>
                                    <option data-avatar="9.png" value="Sandy Vega">
                                        Sandy Vega
                                    </option>
                                    <option data-avatar="11.png" value="Cheryl May">
                                        Cheryl May
                                    </option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="eventLocation">Location</label>
                                <input type="text" class="form-control" id="eventLocation" name="eventLocation" placeholder="Enter Location" />
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="eventDescription">Description</label>
                                <textarea class="form-control" name="eventDescription" id="eventDescription"></textarea>
                            </div>
                            <div class="d-flex justify-content-sm-between justify-content-start mt-6 gap-2">
                                <div class="d-flex">
                                    <button type="submit" id="addEventBtn" class="btn btn-primary btn-add-event me-4">
                                        Add
                                    </button>
                                    <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1" data-bs-dismiss="offcanvas">
                                        Cancel
                                    </button>
                                </div>
                                <button class="btn btn-label-danger btn-delete-event d-none">
                                    Delete
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Calendar & Modal -->
        </div>
    </div>
</div>
<!-- / Content -->
<script>
        // Event listener for form submission
        document.getElementById('eventForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            //  form data
            const eventData = {
                title: document.getElementById('eventTitle').value,
                label: document.getElementById('eventLabel').value,
                start_date: document.getElementById('eventStartDate').value,
                end_date: document.getElementById('eventEndDate').value,
                all_day: document.getElementById('allDaySwitch').checked,
                url: document.getElementById('eventURL').value,
                guests: Array.from(document.getElementById('eventGuests').selectedOptions).map(option => option.value),
                location: document.getElementById('eventLocation').value,
                description: document.getElementById('eventDescription').value
            };

            // Send data to the backend API
            fetch('server/api.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(eventData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Event added successfully!');
                    // Optionally: Reset the form or update the UI
                    document.getElementById('eventForm').reset();
                } else {
                    alert('Error adding event: ' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
<?php require_once 'footer.php'; ?>