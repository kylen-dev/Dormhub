@extends('layouts.app')

@section('content')

<style>
body{
  font-family: 'Inter', sans-serif;
  font-size: 16px;
  line-height: 1.6;
  color: #333;
}

/* Headings */
h1 {
  font-weight: 700;
  font-size: 2.5rem;  /* ~40px desktop */
}
h2 {
  font-weight: 600;
  font-size: 2rem;    /* ~32px */
}
h3 {
  font-weight: 600;
  font-size: 1.5rem;  /* ~24px */
}

/* Buttons & UI */
button, .btn {
  font-weight: 500;
  letter-spacing: 0.5px;
  text-transform: capitalize;
}
    /* Container setup */
    .container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Typography */
    h1, h2, h3 {
        
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

  footer {
    background: #2c3e50;
    color: #fff;
    padding: 30px 20px 15px;
    text-align: center;
    font-size: 0.9rem;
    margin-top: 40px;
    box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);


}

footer .footer-links {
    margin: 10px 0;
}

footer .footer-links a {
    color: #bbb;
    margin: 0 10px;
    text-decoration: none;
    transition: color 0.3s ease;
}

footer .footer-links a:hover {
    color: #fff;
}

footer .footer-social a {
    color: #bbb;
    margin: 0 8px;
    font-size: 1.2rem;
    transition: color 0.3s ease, transform 0.2s ease;
}

footer .footer-social a:hover {
    color: #fff;
    transform: translateY(-2px);
}

    

    /* Hero Section */
.hero {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 60px 20px;
  background: linear-gradient(135deg, #f8f9fc, #eef2f7);
}

.hero-content {
  display: flex;
  max-width: 1100px;
  width: 100%;
  align-items: center;
  justify-content: space-between;
  gap: 40px;
}

.hero-text {
  flex: 1;
}

.hero-text h1 {
  font-size: 2.8rem;
  font-weight: 700;
  color: #1f2937;
  margin-bottom: 15px;
}

.hero-text .highlight {
  color: #e63946;
}

.hero-text p {
  font-size: 1.1rem;
  color: #4b5563;
  line-height: 1.6;
  margin-bottom: 25px;
}

.btn-register {
  display: block;
  margin: 0 auto; /* Center the button */
  background: #e63946;
  color: white;
  border: none;
  padding: 14px 40px;
  font-size: 1rem;
  font-weight: 600;
  border-radius: 30px;
  box-shadow: 0 6px 15px rgba(230, 57, 70, 0.3);
  transition: all 0.3s ease;
  cursor: pointer;
}

.btn-register:hover {
  background: #d62839;
  box-shadow: 0 8px 18px rgba(230, 57, 70, 0.45);
}

.hero-image img {
  flex: 1;
  max-width: 500px;
  border-radius: 20px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* Responsive Hero Section */
@media (max-width: 992px) {
  .hero-content {
    flex-direction: column;
    text-align: center;
    gap: 30px;
  }

  .hero-text {
    flex: none;
    max-width: 100%;
  }

  .hero-text h1 {
    font-size: 2.2rem;
  }

  .hero-text p {
    font-size: 1rem;
  }

  .btn-register {
    margin: 0 auto;
  }

  .hero-image img {
    max-width: 100%;
    height: auto;
  }
}

/* Call-to-action Button */
.search-button {
    display: inline-block;
    padding: 12px 30px;
    background: #dc3545;
    color: #fff;
    font-size: 1rem;
    font-weight: 600;
    text-decoration: none;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    transition: all 0.3s ease;
}

.search-button:hover {
    background: #a71d2a;
    box-shadow: 0 6px 12px rgba(220, 53, 69, 0.4);
    transform: translateY(-2px);
}

.feature-card ul {
  padding-left: 0;
  margin-top: 15px;
  font-size: 0.95rem;
  color: #334155;
}

.feature-card ul li {
  margin-bottom: 8px;
}

.btn-register {
  display: inline-block; /* instead of block */
  margin: 0; /* remove auto centering */
}
.feature-card a.btn-link {
  font-weight: 600;
  color: #2563eb;
  text-decoration: none;
  transition: color 0.3s ease;
}

.feature-card a.btn-link:hover {
  color: #1d4ed8;
}

@media (max-width: 768px) {
  .feature-card h3 {
    font-size: 1.2rem;
  }
  .feature-card p,
  .feature-card ul {
    font-size: 0.9rem;
  }
}

@media (max-width: 768px) {
  .feature-card .icon i {
    font-size: 1.5rem;
  }
}

@media (max-width: 576px) {
  .feature-card a.btn-link {
    display: block;
    margin-top: 10px;
  }
}

/* Responsive */
@media (max-width: 768px) {
    .hero h1 {
        font-size: 2rem;
    }
    .hero p {
        font-size: 1rem;
    }
    .search-button {
        width: 100%;
    }
}


    /* Testimonial */
    .testimonial-section {
        padding: 4rem 1rem;
        text-align: center;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 30px rgba(0,0,0,0.07);
        margin-top: 3rem;
    }

    .testimonial-section .section-title {
        font-size: 2rem;
        color: #2c3e50;
        margin-bottom: 0.25rem;
    }

    .testimonial-section .subtitle {
        font-size: 1.1rem;
        margin-bottom: 2.5rem;
        color: #7f8c8d;
    }

    .testimonial-card {
        max-width: 600px;
        margin: 0 auto;
        padding: 2rem 2.5rem;
        background: #f7f9fc;
        border-left: 6px solid #ff6b6b;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(255, 107, 107, 0.15);
    }

    .testimonial-card blockquote {
        font-style: italic;
        font-size: 1.125rem;
        color: #34495e;
        margin-bottom: 1rem;
    }

    .testimonial-card footer {
        font-weight: 600;
        color: #ff6b6b;
        font-size: 0.9rem;
    }

    /* Responsive adjustments */
   

        .search-button {
            padding: 0.7rem 1.8rem;
            font-size: 1rem;
        }
        
        .feature-card {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}

        .feature-section {
            padding: 2rem 0 3rem;
        }

        .feature-section .feature {
            padding: 1.5rem 1rem;
        }

        .feature-section .feature h3 {
            font-size: 1.1rem;
        }

        .testimonial-section {
            padding: 3rem 1rem;
        }

        .testimonial-section .section-title {
            font-size: 1.8rem;
        }

        .tenant-container {
            padding: 0 15px;
        }
    }

   
        .search-button {
            padding: 0.6rem 1.5rem;
            font-size: 0.95rem;
        }

        .feature-section .feature h3 {
            font-size: 1rem;
        }

        .feature-section .feature p {
            font-size: 0.9rem;
        }

        .property-content {
            padding: 0.8rem;
        }

        .property-title {
            font-size: 1.2rem;
        }
    

    .property-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .property-images {
        height: 200px;
        overflow: hidden;
    }

    .property-images img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .property-content {
        padding: 1rem;
        flex-grow: 1;
    }

   
</style>

<div class="hero">
  <div class="hero-content">
    <div class="hero-text">
      <h1 style="">Welcome to <span class="highlight" style="font-size: 40px ">DormHub</span></h1>
      <p>
        Find and manage student dorms easily. <br>
        Start your search for the perfect living space today and experience hassle-free living.  
      </p>
      <a href="login" class="search-button" role="button" aria-label="Search for Dorms" style="background-color: black">Login</a>
      <a href="register" class="search-button" role="button" aria-label="Search for Dorms">Register</a>
    </div>
    <div class="hero-image">
      <img src="https://static.where-e.com/Philippines/Central_Luzon_Region/Pampanga/Don-Honorio-Ventura-State-University_d4f0672b8be875221f3eb060d5a99fe4.jpg" alt="Dorm Building">
    </div>
  </div>
</div>




<div class="feature-section py-5">
  <div class="container">
    <div class="row text-center">
      
      <!-- Feature 1 -->
      <div class="col-md-4 mb-4">
        <div class="feature-card p-4 shadow-sm rounded">
          <div class="icon mb-3 text-primary">
            <i class="fas fa-home fa-2x"></i>
          </div>
          <h3>Find Your Perfect Dorm</h3>
          <p class="text-muted">Easily compare hundreds of student housing options.</p>
          <ul class="list-unstyled text-start mt-3">
            <li>✔ Filter by location & budget</li>
            <li>✔ Check available amenities</li>
            <li>✔ Read student reviews</li>
          </ul>
          
        </div>
      </div>
      
      <!-- Feature 2 -->
      <div class="col-md-4 mb-4">
        <div class="feature-card p-4 shadow-sm rounded">
          <div class="icon mb-3 text-success">
            <i class="fas fa-mouse-pointer fa-2x"></i>
          </div>
          <h3>Easy Booking</h3>
          <p class="text-muted">Reserve your spot in just a few clicks.</p>
          <ul class="list-unstyled text-start mt-3">
            <li>✔ Instant confirmation</li>
            <li>✔ Secure online payments</li>
            <li>✔ Flexible cancellation options</li>
          </ul>
          
        </div>
      </div>
      
      <!-- Feature 3 -->
      <div class="col-md-4 mb-4">
        <div class="feature-card p-4 shadow-sm rounded">
          <div class="icon mb-3 text-warning">
            <i class="fas fa-chart-line fa-2x"></i>
          </div>
          <h3>Manage Your Stay</h3>
          <p class="text-muted">Stay organized with our smart dashboard.</p>
          <ul class="list-unstyled text-start mt-3">
            <li>✔ Track payments & receipts</li>
            <li>✔ Manage rental duration</li>
            <li>✔ Get instant notifications</li>
          </ul>
        </div>
      </div>
      
    </div>
  </div>
</div>

<div class="tenant-container" style="margin-top: 3rem;">
    <h2 class="text-center mb-4">Available Properties</h2>
    <div class="row">
        @forelse ($properties as $property)
            <div class="col-lg-6 col-xl-4 mb-4">
                <div class="property-card">
                    @if($property->images->first())
                        <div class="property-images" >
                            <img src="{{ asset('storage/property_images/' . $property->images->first()->image_path) }}"
                                 alt="{{ $property->title }}">
                        </div>
                    @else
                        <div class="property-images" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-home fa-3x text-white"></i>
                        </div>
                    @endif

                    <div class="property-content">
                        <h5 class="property-title">{{ $property->title }}</h5>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i> {{ $property->location }}
                        </p>
                        <p class="property-price">₱{{ number_format($property->price, 0) }}</p>
                        <p class="property-description">{{ Str::limit($property->description, 100) }}</p>
                        <p class="property-landlord">By {{ $property->user->first_name }} {{ $property->user->last_name }}</p>

                        <a href="{{ route('tenant.properties.show', $property->id) }}" class="btn btn-tenant btn-tenant-primary">
                            <i class="fas fa-eye"></i> View Details
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="empty-state">
                    <i class="fas fa-building"></i>
                    <h4>No Properties Available</h4>
                    <p>There are currently no properties listed. Please check back later.</p>
                </div>
            </div>
        @endforelse
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('tenant.properties.index') }}" class="btn btn-tenant btn-tenant-primary">
            <i class="fas fa-list"></i> Browse Properties
        </a>
    </div>
</div>



<footer>

    &copy; {{ date('Y') }} DormHub. All rights reserved.
    <div class="footer-links">
    <a href="/login">Login</a>
    <a href="/register">Register</a>
</div>

</footer>
</div>

@endsection