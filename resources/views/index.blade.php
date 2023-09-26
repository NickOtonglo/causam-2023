@extends('master')

@if($flash = session('success'))
<div class="alert-message success">
    <div class="container">
        <span><i class="fa-solid fa-check"></i></span>
        <span>{{ $flash }}</span>
    </div>
</div>
@endif

<div class="navbar">
    <div class="container">
        <h1><a href="/">causam</a></h1>
        <nav>
            @include('components.navmenu-home')
        </nav>
    </div>
</div>

@section('content')
<div id="showcase">
    <div class="container">
        <h3>Causam is a comprehensive branding and IT service provider focused on serving our clients and delivering measurable results</h3>
        <div class="grid-65-35">
            <p class="p-main">In a world where the competition is cut throat and technology allows a lot of coy-cat strategies, a good brand is
                what sets you apart. It’s not just about creating a website, it’s about branding yourself to help communicate your
                “why”. If you don’t have a reason for customers to come to you, then are you really in business?</p>
            <div class="card card-header-text">
                <h4>Would you like to get in touch?</h4>
                <p>You can reach out to us by filling out the contact form at the bottom of this page. We will get in touch with you soon.</p>
                <a href="#about" class="btn btn-link-round "><i class="fa-solid fa-arrow-down"></i></a>
            </div>
        </div>
    </div>
</div>
<section id="what-we-do">
    <div class="container">
        <h2 class="section-title">Services</h2>
        <div class="cards-flex">
            <div class="card card-img-bg-txt card-clickable">
                <a href="#">
                    <div class="img" style="background-image: url('storage/images/static/stationery-vector.jpg');"></div>
                    <div class="text">
                        <h4>Brand identification</h4>
                        <p>We help the company to clearly define who they are. We help them answer the questions such as: What do they want to be known for? Do they have a USP they want to associate with?</p>
                    </div>
                </a>
            </div>
            <div class="card card-img-bg-txt card-clickable">
                <a href="#">
                    <div class="img" style="background-image: url('storage/images/static/awareness.png');"></div>
                    <div class="text">
                        <h4>Brand awareness and positioning</h4>
                        <p>Providing companies with the necessary branding elements to assist them in building their brand awareness and positioning themselves in an ever increasingly competitive world.</p>
                    </div>
                </a>
            </div>
            <div class="card card-img-bg-txt card-clickable">
                <a href="#">
                    <div class="img" style="background-image: url('storage/images/static/starbucks-brand-resonance-pyramid.jpg');"></div>
                    <div class="text">
                        <h4>Brand resonance</h4>
                        <p>Continuous engagement and training our clients on how to handle their digital marketing campaigns. This enables the clients to maintain relevance and brand loyalty among their customers.</p>
                    </div>
                </a>
            </div>
            <div class="card card-img-bg-txt card-clickable">
                <a href="#">
                    <div class="img" style="background-image: url('storage/images/static/card_software.jpg');"></div>
                    <div class="text">
                        <h4>Software solutions</h4>
                        <p>Engineering solutions and tailoring deliverables to meet clients' specific needs. We are driven by the ambition to build well-developed, efficient and scalable applications for all our customers.</p>
                    </div>
                </a>
            </div>
            <div class="card card-img-bg-txt card-clickable">
                <a href="#">
                    <div class="img" style="background-image: url('storage/images/static/card_server.jpg');"></div>
                    <div class="text">
                        <h4>Domain, website and email migration</h4>
                        <p>Migrating your brand's domain, website and emails can be overwhelming and risky to your data and SEO configurations. Our dozens of clients entrusted us with this task and they couldn't have made a better choice!</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section id="portfolio">
    <h2 class="section-title">Portfolio</h2>
    <div class="container">
        <div class="portfolio-grp">
            <a href="https://edenhousefoundation.org/" target="_blank">
                <div class="card card-img card-img-link" style="background-image: url('storage/images/static/eden_house.jpg');">
                    <div><p>Visit</p></div>
                </div>
            </a>
            <a href="https://gmaurich.com" target="_blank">
                <div class="card card-img card-img-link" style="background-image: url('storage/images/static/gmaurich.jpg');">
                    <div><p>Visit</p></div>
                </div>
            </a>
            <a href="#" target="_blank">
                <div class="card card-img card-img-link" style="background-image: url('storage/images/static/oasis.jpg');">
                    <div><p>Visit</p></div>
                </div>
            </a>
            <a href="#" target="_blank">
                <div class="card card-img card-img-link" style="background-image: url('storage/images/static/reen_blog.jpg');">
                    <div><p>Visit</p></div>
                </div>
            </a>
            <a href="https://laterrazzarestaurant.co.ke" target="_blank">
                <div class="card card-img card-img-link" style="background-image: url('storage/images/static/latarrazzarestaurant.png');">
                    <div><p>Visit</p></div>
                </div>
            </a>
            <a href="https://ofgen.africa" target="_blank">
                <div class="card card-img card-img-link" style="background-image: url('storage/images/static/ofgen.africa.png');">
                    <div><p>Visit</p></div>
                </div>
            </a>
            <a href="https://ourstory.auntjohnnie.com" target="_blank">
                <div class="card card-img card-img-link" style="background-image: url('storage/images/static/ourstory.png');">
                    <div><p>Visit</p></div>
                </div>
            </a>
            <a href="#" target="_blank">
                <div class="card card-img card-img-link" style="background-image: url('storage/images/static/bp-showcase.png');">
                    <div><p>Coming soon</p></div>
                </div>
            </a>
        </div>
    </div>
</section>
<section id="clients">
    <div class="container">
        <h2 class="section-title">Our clients</h2>
        <div class="clients-grp">
            <div class="card card-img-sm-txt card-clickable">
                <a href="#">
                    <img src="storage/images/static/client_avdc.png" alt="">
                    <h4>AVDC</h4>
                </a>
            </div>
            <div class="card card-img-sm-txt card-clickable">
                <a href="#">
                    <img src="storage/images/static/client_fie.png" alt="">
                    <h4>Fie-Consult</h4>
                </a>
            </div>
            <div class="card card-img-sm-txt card-clickable">
                <a href="#">
                    <img src="storage/images/static/client_gc_inv.png" alt="">
                    <h4>GC Investments</h4>
                </a>
            </div>
            <div class="card card-img-sm-txt card-clickable">
                <a href="#">
                    <img src="storage/images/static/client_gmaurich.png" alt="">
                    <h4>Gmaurich Insights</h4>
                </a>
            </div>
            <div class="card card-img-sm-txt card-clickable">
                <a href="#">
                    <img src="storage/images/static/client_grace.png" alt="">
                    <h4>Grace Concern</h4>
                </a>
            </div>
            <div class="card card-img-sm-txt card-clickable">
                <a href="#">
                    <img src="storage/images/static/client_laterrazza.png" alt="">
                    <h4>La Terrazza</h4>
                </a>
            </div>
            <div class="card card-img-sm-txt card-clickable">
                <a href="#">
                    <img src="storage/images/static/client_ofgen.png" alt="">
                    <h4>Ofgen</h4>
                </a>
            </div>
            <div class="card card-img-sm-txt card-clickable">
                <a href="#">
                    <img src="storage/images/static/client_tacc.png" alt="">
                    <h4>TACC</h4>
                </a>
            </div>
        </div>
        <div class="quote">
            <blockquote>
                <h3><q>They helped me to clearly define and communicate my USP to my potential clients setting myself apart from my competitors.</q></h3>
                <footer>- Caroline Nkatha, <cite title="Source Title">Managing Director at Gmaurich Insights</cite></footer>
            </blockquote>
        </div>
    </div>
</section>
<section id="about">
    <div class="container">
        <h2 class="section-title">About us</h2>
        <div class="cards-flex">
            <div class="card card-img-circle-text">
                <div class="img" style="background: url('storage/images/static/david.jpg');"></div>
                <div class="text">
                    <h3>David K Muriuki</h3>
                    <h4>Managing Partner</h4>
                    <p>David worked in the business analysis and consulting sector for 5 years working closely with SMEs helping them formulate and implement strategies for growth. From his experience David has come to understand what the benefits of good brand development are especially in an ever increasingly competitive world.</p>
                </div>
            </div>
            <div class="card card-img-circle-text">
                <div class="img" style="background: url('storage/images/static/raphael.jpg');"></div>
                <div class="text">
                    <h3>Raphael M Gati</h3>
                    <h4>Managing Partner</h4>
                    <p>Raphael is creative and multi-talented finance and multimedia designer skilled in finance, marketing, multimedia (photography,video and audio) and print design. Passionate and inventive creator of innovative marketing strategies and campaigns; accustomed to performing in deadline-driven environments with an emphasis on working within budget requirements.</p>
                </div>
            </div>
            <div class="card card-img-circle-text">
                <div class="img" style="background: url('storage/images/static/nick.jpg');"></div>
                <div class="text">
                    <h3>Nicholas Otonglo</h3>
                    <h4>Software Developer</h4>
                    <p>Nick is a software developer by profession with 3 years of experience in fullstack software development using different frameworks. He is also a certified mobile developer in Android with about 5 years of experience in that field. He is the tech lead in our app development projects. When it comes to writing code, he is our guru.</p>
                </div>
            </div>
            <div class="card card-img-circle-text">
                <div class="img" style="background: url('storage/images/static/brian.jpg');"></div>
                <div class="text">
                    <h3>Brian Ogenge</h3>
                    <h4>Software Developer</h4>
                    <p>Brian is our backend engineer. He specialises in designing and building the backend systems that our applications run on. He has 5+ years of experience with languages such as C# and JavaScript, and has worked with frameworks such as .NET. He also handles maintenance of our databases and servers.</p>
                </div>
            </div>
        </div>
        <div class="quote">
            <h3><q>In design, there is no such thing as “rules”. There is, however, common sense.</q></h3>
        </div>
        <div class="about-grp grid-40-60">
            <div class="card card-form">
                <h2>Get in touch</h2>
                <form action="/" method="POST">
                    @csrf
                    <div class="form-control">
                        <input type="text" name="sender_name" placeholder="Name" required>
                    </div>
                    <div class="form-control">
                        <input type="email" name="sender_email" placeholder="Email address" required>
                    </div>
                    <div class="form-control">
                        <textarea type="text" name="message" placeholder="Message" rows="4" required></textarea>
                    </div>
                    @if(session('success'))
                    <div class="alert-message success">
                        <div class="container">
                            <span><i class="fa-solid fa-check"></i></span>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                    @endif
                    <div class="form-control">
                        <input class="btn-primary btn-medium" type="submit" value="Submit">
                    </div>
                </form>
                <div class="physical">
                    <p>Greenhouse Mall, along Ngong Road,</p>
                    <p>4th floor Suite 10</p>
                    <p>Nairobi, Kenya</p>
                </div>
                <br>
                <div class="physical">
                    <p>Alternatively, email us on <b>info@causam.co.ke</b>.</p>
                </div>
            </div>
            <p class="text">Causam Company started out as a result of a lack of proper brand development strategies among local SMEs
                that would allow them to have a slightly greater competitive advantage especially in a very competitive world as we
                have today. We understand the benefits that a good brand development strategy can bring to a business. Having worked
                with different SMEs for 2 years, our managing partners realized that these organizations lack sufficient brand
                development strategies that were aligned to their values and strategic goals. These organizations we not using
                branding to help communicate their USPs. In summary, SMEs where able to answer the question, “Why cho card-img-linkose you?” but did
                not have the right elements or communication channels to help communicate this answer.</p>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div>
            <img src="storage/images/static/logo.png" alt="">
            <h1>causam</h1>
            <p>Copyright &copy; 2023</p>
        </div>
        <nav>
            <ul>
                <li><a href="#what-we-do">What we do</a></li>
                <li><a href="#portfolio">Work</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="#about">Contact</a></li>
                <li><a href="/articles">Articles</a></li>
            </ul>
        </nav>
    </div>
</footer>
@endsection
