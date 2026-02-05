<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Navigation */
        nav {
            position: sticky;
            top: 0;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 100;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            padding: 1rem;
        }

        nav li {
            margin: 0 1.5rem;
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
            scroll-behavior: smooth;
        }

        nav a:hover {
            color: #007bff;
        }

        /* Sections */
        section {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            scroll-margin-top: 80px;
        }

        section h2 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: #222;
            border-bottom: 3px solid #007bff;
            padding-bottom: 0.5rem;
        }

        /* About Section */
        #about {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        #about h2 {
            border-bottom-color: #fff;
            color: white;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: center;
        }

        .about-text h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .about-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .about-links a {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: rgba(255,255,255,0.2);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .about-links a:hover {
            background: rgba(255,255,255,0.4);
        }

        /* Education Section */
        .education-items {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .education-card {
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .education-card:hover {
            transform: translateY(-5px);
        }

        .education-card h4 {
            color: #007bff;
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        .education-card p {
            color: #666;
            margin: 0.5rem 0;
        }

        /* Work Section */
        .work-items {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .work-card {
            background: #f8f9fa;
            padding: 2rem;
            border-left: 4px solid #007bff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .work-card h4 {
            color: #007bff;
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        /* Certifications Section */
        .certification-items {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .certification-card {
            background: white;
            border: 2px solid #007bff;
            padding: 1.5rem;
            border-radius: 8px;
            text-align: center;
        }

        .certification-card h4 {
            color: #007bff;
            margin-bottom: 0.5rem;
        }

        /* Skills Section */
        .skills-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1.5rem;
        }

        .skill-item {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .skill-item h4 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .skill-item p {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Projects Section */
        .projects-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
        }

        .project-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            transition: transform 0.3s;
        }

        .project-card:hover {
            transform: translateY(-8px);
        }

        .project-image {
            width: 100%;
            height: 250px;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #ddd;
        }

        .project-content {
            padding: 1.5rem;
        }

        .project-content h4 {
            color: #007bff;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin: 1rem 0;
        }

        .tech-tag {
            display: inline-block;
            background: #e9ecef;
            color: #495057;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .project-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .project-links a {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: background 0.3s;
        }

        .project-links a:hover {
            background: #0056b3;
        }

        /* Contact Section */
        #contact {
            background: #f8f9fa;
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: inherit;
            font-size: 1rem;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0,123,255,0.25);
        }

        button {
            background: #007bff;
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
            width: 100%;
        }

        button:hover {
            background: #0056b3;
        }

        .alert {
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav li {
                margin: 0.5rem 0;
            }

            section {
                padding: 2rem 1rem;
            }

            section h2 {
                font-size: 1.8rem;
            }

            .about-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="#about">About</a></li>
            <li><a href="#education">Education</a></li>
            <li><a href="#work">Work</a></li>
            <li><a href="#certifications">Certifications</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
            @auth
                <li><a href="{{ route('admin.education.index') }}">Admin Panel</a></li>
            @endauth
        </ul>
    </nav>

    <!-- About Section -->
    @if($about)
    <section id="about">
        <h2>About Me</h2>
        <div class="about-content">
            <div class="about-text">
                <h3>{{ $about->name }}</h3>
                <p>{{ $about->content }}</p>
                <div class="about-links">
                    @if($about->linkedin)
                        <a href="{{ $about->linkedin }}" target="_blank">LinkedIn</a>
                    @endif
                    @if($about->github)
                        <a href="{{ $about->github }}" target="_blank">GitHub</a>
                    @endif
                    @if($about->resume)
                        <a href="{{ Storage::url($about->resume) }}" target="_blank">Resume (PDF)</a>
                    @endif
                </div>
                <div style="margin-top: 1.5rem;">
                    <p><strong>Email:</strong> {{ $about->email }}</p>
                    <p><strong>Phone:</strong> {{ $about->phone }}</p>
                </div>
            </div>
            @if($about->profile_image)
            <div style="text-align: center;">
                <img src="{{ Storage::url($about->profile_image) }}" alt="{{ $about->name }}" style="width: 250px; height: 250px; border-radius: 50%; object-fit: cover; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
            </div>
            @endif
        </div>
    </section>
    @endif

    <!-- Education Section -->
    @if($educations->count() > 0)
    <section id="education">
        <h2>Education</h2>
        <div class="education-items">
            @foreach($educations as $education)
            <div class="education-card">
                @if($education->logo)
                    <img src="{{ Storage::url($education->logo) }}" alt="Logo" style="width: 100%; height: 150px; object-fit: cover; border-radius: 5px; margin-bottom: 1rem;">
                @endif
                <h4>{{ $education->title }}</h4>
                <p><strong>{{ $education->institution }}</strong></p>
                <p class="text-muted">{{ $education->year_start }} - {{ $education->year_end }}</p>
                @if($education->grade)
                    <p style="color: #0066cc; font-weight: 500;">Grade/GPA: {{ $education->grade }}</p>
                @endif
                <p>{{ $education->description }}</p>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Work Section -->
    @if($works->count() > 0)
    <section id="work">
        <h2>Work Experience</h2>
        <div class="work-items">
            @foreach($works as $work)
            <div class="work-card">
                <div style="display: flex; gap: 1rem; align-items: start;">
                    @if($work->logo)
                        <img src="{{ Storage::url($work->logo) }}" alt="Logo" style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px; flex-shrink: 0;">
                    @endif
                    <div style="flex: 1;">
                        <h4>{{ $work->position }}</h4>
                        <p><strong>{{ $work->company }}</strong></p>
                        <p class="text-muted">{{ $work->year_start }} - {{ $work->year_end }}</p>
                        <p>{{ $work->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Certifications Section -->
    @if($certifications->count() > 0)
    <section id="certifications">
        <h2>Certifications & Achievements</h2>
        <div class="certification-items">
            @foreach($certifications as $cert)
            <div class="certification-card">
                @if($cert->logo)
                    <img src="{{ Storage::url($cert->logo) }}" alt="Logo" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%; margin: 0 auto 1rem;">
                @endif
                <h4>{{ $cert->title }}</h4>
                <p><strong>{{ $cert->issuing_organisation }}</strong></p>
                <p class="text-muted">{{ $cert->category }}</p>
                <p>Issued: {{ $cert->issued }}</p>
                @if($cert->expires)
                    <p>Expires: {{ $cert->expires }}</p>
                @endif
                <p>{{ $cert->description }}</p>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Skills Section -->
    @if($skills->count() > 0)
    <section id="skills">
        <h2>Skills</h2>
        <div class="skills-container">
            @foreach($skills as $skill)
            <div class="skill-item">
                @if($skill->image)
                    <img src="{{ Storage::url($skill->image) }}" alt="Skill" style="width: 60px; height: 60px; object-fit: contain; margin-bottom: 0.5rem;">
                @endif
                <h4>{{ $skill->name }}</h4>
                <p>{{ $skill->level }} | {{ $skill->category }}</p>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Projects Section -->
    @if($projects->count() > 0)
    <section id="projects">
        <h2>Projects</h2>
        <div class="projects-container">
            @foreach($projects as $project)
            <div class="project-card">
                @if($project->image)
                    <img src="{{ Storage::url($project->image) }}" alt="Project" style="width: 100%; height: 250px; object-fit: cover;">
                @else
                    <div class="project-image">📁</div>
                @endif
                <div class="project-content">
                    <h4>{{ $project->title }}</h4>
                    <p class="text-muted">{{ $project->short_description }}</p>
                    <p>{{ Str::limit($project->full_description, 150) }}</p>
                    <div class="project-tech">
                        @foreach($project->tech_stack as $tech)
                            <span class="tech-tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                    <p class="text-muted"><strong>Status:</strong> {{ ucfirst($project->status) }}</p>
                    <p class="text-muted">{{ $project->start_date }} to {{ $project->end_date ?? 'Present' }}</p>
                    <div class="project-links">
                        @if($project->live_url)
                            <a href="{{ $project->live_url }}" target="_blank">View Live</a>
                        @endif
                        @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank">GitHub</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Contact Section -->
    <section id="contact">
        <h2>Get In Touch</h2>
        <div class="contact-form">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required>{{ old('message') }}</textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>
