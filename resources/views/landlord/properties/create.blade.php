@extends('layouts.app')


@push('styles')
<style>
    /* Landlord-specific modern design for create form */
    .landlord-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem 0;
        margin-bottom: 2rem;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .landlord-header h2 {
        font-weight: 300;
        margin-bottom: 0;
        font-size: 2.5rem;
    }

    .landlord-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .form-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
        border: none;
    }

    .form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        text-align: center;
    }

    .form-header h3 {
        font-weight: 300;
        margin-bottom: 0.5rem;
        font-size: 2rem;
    }

    .form-header p {
        opacity: 0.9;
        margin-bottom: 0;
    }

    .form-content {
        padding: 2.5rem;
    }

    /* Step indicator */
    .step-indicator {
        display: flex;
        justify-content: center;
        margin-bottom: 2rem;
    }

    .step {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #e9ecef;
        color: #6c757d;
        font-weight: 600;
        margin: 0 0.5rem;
        transition: all 0.3s ease;
    }

    .step.active {
        background: #667eea;
        color: white;
    }

    .step.completed {
        background: #28a745;
        color: white;
    }

    .step-line {
        width: 60px;
        height: 2px;
        background: #e9ecef;
        margin: 0 0.5rem;
    }

    .step-line.active {
        background: #667eea;
    }

    /* Step content */
    .step-content {
        display: none;
    }

    .step-content.active {
        display: block;
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Room management */
    .room-card {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        border: 1px solid #e9ecef;
    }

    .room-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .room-title {
        font-weight: 600;
        color: #2c3e50;
    }

    .room-images {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .room-image {
        width: 80px;
        height: 80px;
        border-radius: 8px;
        object-fit: cover;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .room-image:hover {
        transform: scale(1.05);
    }

    .form-group {
        margin-bottom: 2rem;
    }

    .form-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        display: block;
        font-size: 0.95rem;
    }

    .form-control {
        border: 2px solid #e1e8ed;
        border-radius: 10px;
        padding: 0.8rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #f8f9fa;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        background-color: white;
        outline: none;
    }

    .form-control[readonly] {
        background-color: #e9ecef;
        cursor: not-allowed;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .map-container {
        border-radius: 10px;
        overflow: hidden;
        border: 2px solid #e1e8ed;
        margin-bottom: 2rem;
    }

    #map {
        height: 350px;
        width: 100%;
    }

    .gps-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 25px;
        padding: 0.8rem 2rem;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .gps-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
    }

    .file-input-wrapper {
        position: relative;
        border: 2px dashed #667eea;
        border-radius: 10px;
        padding: 2rem;
        text-align: center;
        background-color: #f8f9ff;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .file-input-wrapper:hover {
        background-color: #f0f2ff;
        border-color: #5a6fd8;
    }

    .file-input {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .file-input-label {
        color: #667eea;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .file-input-hint {
        color: #7f8c8d;
        font-size: 0.9rem;
    }

    .btn-landlord {
        border-radius: 25px;
        padding: 0.8rem 2rem;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        border: none;
        min-width: 140px;
    }

    .btn-landlord-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-landlord-primary:hover {
        background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
    }

    .btn-landlord-secondary {
        background: #ecf0f1;
        color: #2c3e50;
        border: 2px solid #bdc3c7;
    }

    .btn-landlord-secondary:hover {
        background: #d5dbdb;
        transform: translateY(-2px);
    }

    .back-btn {
        top: 2rem;
        left: 2rem;
        z-index: 10;
    }

    .row-inputs {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    @media (max-width: 768px) {
        .row-inputs {
            grid-template-columns: 1fr;
        }

        .form-content {
            padding: 1.5rem;
        }

        .form-header {
            padding: 1.5rem;
        }

        .landlord-header {
            padding: 1.5rem 0;
        }

        .landlord-header h2 {
            font-size: 2rem;
        }
    }

    /* Error styling */
    .error-message {
        color: #e74c3c;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .form-control.is-invalid {
        border-color: #e74c3c;
    }
</style>
@endpush

@section('content')

<div class="landlord-header">
    <div class="landlord-container">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex align-items-center">
                <a href="{{ route('landlord.properties.index') }}" class="btn btn-light back-btn me-5" >
                    ← Back
                </a>
                <h2>Add New Property</h2>
            </div>
        </div>
    </div>
</div>

<div class="landlord-container">
    <div class="form-card">
        <div class="form-header">
            <h3>Property Details</h3>
            <p>Fill in the information below to add your property</p>
        </div>

        <div class="form-content">
            <form action="{{ route('landlord.properties.store') }}" method="POST" enctype="multipart/form-data" id="propertyForm">
                @csrf

                <h4 class="mb-4">Property Details</h4>

                <div class="form-group">
                    <label class="form-label">Property Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}" placeholder="Enter property title" required>
                    @error('title')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                              rows="4" placeholder="Describe your property" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Location (Address)</label>
                    <input type="text" id="location" name="location"
                           class="form-control @error('location') is-invalid @enderror"
                           value="{{ old('location') }}" placeholder="Enter full address" required>
                    @error('location')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row-inputs">
                    <div class="form-group">
                        <label class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude"
                               placeholder="14.5995" readonly required value="{{ old('latitude') ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude"
                               placeholder="120.9842" readonly required value="{{ old('longitude') ?? '' }}">
                    </div>
                </div>

                <div class="form-group">
                    <button type="button" id="useLocation" class="gps-btn">
                        <i class="fas fa-crosshairs"></i> Use Current Location
                    </button>
                </div>

                <div class="map-container">
                    <div id="map" style="height: 320px; width: 100%;"></div>
                </div>

                <div class="row-inputs">
                    <div class="form-group">
                        <label class="form-label">Monthly Price (₱)</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                               value="{{ old('price') }}" placeholder="50000" min="0" required>
                        @error('price')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Number of Rooms</label>
                        <input type="number" name="room_count" class="form-control @error('room_count') is-invalid @enderror"
                               value="{{ old('room_count', 1) }}" min="1" required>
                        @error('room_count')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Property Images <span class="text-danger">*</span></label>
                    <div class="file-input-wrapper" id="fileInputWrapper" style="cursor:pointer;">
                        <input type="file" name="images[]" class="file-input" id="imageInput" multiple accept="image/*" required style="display: none;">
                        <div class="file-input-label" id="uploadLabel" role="button" aria-hidden="true">
                            <i class="fas fa-cloud-upload-alt fa-2x"></i>
                            <br>Click to Upload Images
                        </div>
                        <div class="file-input-hint">Select 1-10 images (JPG, PNG, GIF, WebP - High quality recommended)</div>
                    </div>

                    <!-- Image Preview Area -->
                    <div id="imagePreview" class="mt-3" style="display: none;">
                        <h6 class="text-muted mb-3">Selected Images:</h6>
                        <div id="previewContainer" class="d-flex flex-wrap gap-2"></div>
                    </div>

                    @error('images')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    @error('images.*')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-landlord-primary" id="submitBtn">
                        <i class="fas fa-save"></i> Save Property
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Elements
    const form = document.getElementById('propertyForm');
    const submitBtn = document.getElementById('submitBtn');
    const originalBtnHtml = submitBtn ? submitBtn.innerHTML : '';
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    const previewContainer = document.getElementById('previewContainer');
    const fileInputWrapper = document.getElementById('fileInputWrapper');
    const uploadLabel = document.getElementById('uploadLabel');

    const latInput = document.getElementById('latitude');
    const lngInput = document.getElementById('longitude');
    const useGpsBtn = document.getElementById('useLocation');
    const locationInput = document.getElementById('location');

    // Helper: trigger file input when wrapper clicked
    fileInputWrapper.addEventListener('click', function(e) {
        // If the user clicked the actual input (rare, since it's hidden), do nothing
        if (e.target === imageInput) return;
        imageInput.click();
    });

    // Image preview and validation
    imageInput.addEventListener('change', function(e) {
        const files = Array.from(e.target.files || []);
        previewContainer.innerHTML = '';
        let validFiles = 0;
        let invalidFiles = 0;
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];

        if (files.length === 0) {
            imagePreview.style.display = 'none';
            fileInputWrapper.style.borderColor = '#667eea';
            uploadLabel.innerHTML = `<i class="fas fa-cloud-upload-alt fa-2x"></i><br>Click to Upload Images`;
            return;
        }

        if (files.length > 10) {
            fileInputWrapper.style.borderColor = '#e74c3c';
            uploadLabel.innerHTML = `<i class="fas fa-exclamation-triangle fa-2x text-danger"></i><br>Maximum 10 images allowed`;
            imagePreview.style.display = 'none';
            return;
        }

        imagePreview.style.display = 'block';

        files.forEach((file, index) => {
            if (!allowedTypes.includes(file.type)) {
                invalidFiles++;
                return;
            }
            validFiles++;
            const reader = new FileReader();
            reader.onload = function(ev) {
                const previewItem = document.createElement('div');
                previewItem.className = 'position-relative d-inline-block';
                previewItem.style.marginRight = '8px';
                previewItem.innerHTML = `
                    <img src="${ev.target.result}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;" title="${file.name}">
                    <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 preview-remove-btn" data-index="${index}" style="transform: translate(25%, -25%);">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                previewContainer.appendChild(previewItem);
                previewItem.querySelector('.preview-remove-btn').addEventListener('click', function() {
                    const idx = parseInt(this.getAttribute('data-index'), 10);
                    removeImage(idx);
                });
            };
            reader.readAsDataURL(file);
        });

        if (invalidFiles > 0) {
            fileInputWrapper.style.borderColor = '#e74c3c';
            uploadLabel.innerHTML = `<i class="fas fa-exclamation-triangle fa-2x text-danger"></i><br>${validFiles} valid, ${invalidFiles} invalid files`;
        } else {
            fileInputWrapper.style.borderColor = '#667eea';
            uploadLabel.innerHTML = `<i class="fas fa-check-circle fa-2x text-success"></i><br>${validFiles} image(s) selected`;
        }
    });

    // Remove image by index (rebuild DataTransfer)
    window.removeImage = function(index) {
        const dt = new DataTransfer();
        const files = Array.from(imageInput.files || []);
        files.forEach((file, i) => {
            if (i !== index) dt.items.add(file);
        });
        imageInput.files = dt.files;
        imageInput.dispatchEvent(new Event('change'));
    };

    // Form submission validation
    form.addEventListener('submit', function(e) {
        const requiredFields = ['title', 'description', 'location', 'latitude', 'longitude', 'price', 'room_count'];
        let isValid = true;

        requiredFields.forEach(field => {
            const el = form.querySelector(`[name="${field}"]`);
            if (!el || !el.value || !el.value.toString().trim()) {
                if (el) el.classList.add('is-invalid');
                isValid = false;
            } else {
                if (el) el.classList.remove('is-invalid');
            }
        });

        if (!imageInput.files || imageInput.files.length === 0) {
            fileInputWrapper.style.borderColor = '#e74c3c';
            uploadLabel.innerHTML = `<i class="fas fa-exclamation-triangle fa-2x text-danger"></i><br>Please select at least one image`;
            isValid = false;
        } else {
            fileInputWrapper.style.borderColor = '#667eea';
        }

        if (!isValid) {
            e.preventDefault();
            return false;
        }

        // Show loading state
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
            submitBtn.style.opacity = '0.7';
        }
    });

    // Re-enable button if native validation fails
    form.addEventListener('invalid', function(e) {
        if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnHtml;
            submitBtn.style.opacity = '1';
        }
    }, true);

    // Blur validation feedback
    const inputs = form.querySelectorAll('input[required], textarea[required]');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value && this.value.toString().trim()) {
                this.classList.remove('is-invalid');
            } else {
                this.classList.add('is-invalid');
            }
        });
    });

    // ===== Map & Geolocation =====
    const initLat = parseFloat(latInput.value) || 14.5995;
    const initLng = parseFloat(lngInput.value) || 120.9842;

    // Initialize Leaflet map
    const map = L.map('map').setView([initLat, initLng], 13);
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 19,
        attribution: "© OpenStreetMap contributors",
    }).addTo(map);

    let marker = L.marker([initLat, initLng], { draggable: true }).addTo(map);

    function setFields(lat, lng) {
        latInput.value = Number(lat).toFixed(12);
        lngInput.value = Number(lng).toFixed(12);
    }

    function updateMarker(lat, lng, zoom = 16) {
        marker.setLatLng([lat, lng]);
        map.setView([lat, lng], zoom);
        setFields(lat, lng);
    }

    setFields(initLat, initLng);

    marker.on('dragend', () => {
        const pos = marker.getLatLng();
        setFields(pos.lat, pos.lng);
    });

    map.on('click', (e) => {
        updateMarker(e.latlng.lat, e.latlng.lng);
    });

    latInput.addEventListener('change', () => {
        const lat = parseFloat(latInput.value);
        const lng = parseFloat(lngInput.value);
        if (!isNaN(lat) && !isNaN(lng)) updateMarker(lat, lng);
    });

    lngInput.addEventListener('change', () => {
        const lat = parseFloat(latInput.value);
        const lng = parseFloat(lngInput.value);
        if (!isNaN(lat) && !isNaN(lng)) updateMarker(lat, lng);
    });

    useGpsBtn.addEventListener('click', () => {
        if (!navigator.geolocation) {
            alert('Geolocation is not supported by your browser.');
            return;
        }
        navigator.geolocation.getCurrentPosition(
            (pos) => updateMarker(pos.coords.latitude, pos.coords.longitude),
            (err) => alert('GPS failed: ' + err.message + '\nTip: GPS requires HTTPS or localhost.'),
            { enableHighAccuracy: true, timeout: 10000, maximumAge: 0 }
        );
    });

    // Auto-geocode address to lat/lng when location input loses focus
    locationInput.addEventListener('blur', function() {
        const address = this.value && this.value.toString().trim();
        if (!address) return;

        // Use Nominatim (free) for geocoding
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}&limit=1`)
            .then(response => response.json())
            .then(data => {
                if (Array.isArray(data) && data.length > 0) {
                    const lat = parseFloat(data[0].lat);
                    const lon = parseFloat(data[0].lon);
                    if (!isNaN(lat) && !isNaN(lon)) updateMarker(lat, lon);
                } else {
                    console.warn('No geocoding results found for address:', address);
                }
            })
            .catch(error => console.error('Geocoding error:', error));
    });

    // If the map is inside a hidden tab/flex, let it re-render
    setTimeout(() => map.invalidateSize(), 200);
});
</script>

@endsection
