@extends('master')

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
        <h3>Causam is a comprehensive Branding agency focused on serving our clients and delivering measurable results</h3>
        <div class="grid-65-35">
            <p class="p-main">In a world where the competition is cut throat and technology allows a lot of coy-cat strategies, a good brand is
                what sets you apart. It’s not just about creating a website, it’s about branding yourself to help communicate your
                “why”. If you don’t have a reason for customers to come to you, then are you really in business?</p>
            <div class="card card-header-text">
                <h4>Would you like to get in touch?</h4>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non porro ut saepe, nobis cum explicabo!</p>
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
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, commodi?</p>
                    </div>
                </a>
            </div>
            <div class="card card-img-bg-txt card-clickable">
                <a href="#">
                    <div class="img" style="background-image: url('storage/images/static/stationery-vector.jpg');"></div>
                    <div class="text">
                        <h4>Brand identification</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, commodi?</p>
                    </div>
                </a>
            </div>
            <div class="card card-img-bg-txt card-clickable">
                <a href="#">
                    <div class="img" style="background-image: url('storage/images/static/stationery-vector.jpg');"></div>
                    <div class="text">
                        <h4>Brand identification</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, commodi?</p>
                    </div>
                </a>
            </div>
            <div class="card card-img-bg-txt card-clickable">
                <a href="#">
                    <div class="img" style="background-image: url('storage/images/static/stationery-vector.jpg');"></div>
                    <div class="text">
                        <h4>Brand identification</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, commodi?</p>
                    </div>
                </a>
            </div>
            <div class="card card-img-bg-txt card-clickable">
                <a href="#">
                    <div class="img" style="background-image: url('storage/images/static/stationery-vector.jpg');"></div>
                    <div class="text">
                        <h4>Brand identification</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, commodi?</p>
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
            <a href="#">
                <div class="card card-img card-img-link" style="background-image: url('storage/images/static/eden_house.jpg');">
                    <div><p>Visit</p></div>
                </div>
            </a>
            <a href="#">
                <div class="card card-img card-img-link" style="background-image: url('storage/images/static/eden_house.jpg');">
                    <div><p>Visit</p></div>
                </div>
            </a>
            <a href="#">
                <div class="card card-img card-img-link" style="background-image: url('storage/images/static/eden_house.jpg');">
                    <div><p>Visit</p></div>
                </div>
            </a>
            <a href="#">
                <div class="card card-img card-img-link" style="background-image: url('storage/images/static/eden_house.jpg');">
                    <div><p>Visit</p></div>
                </div>
            </a>
            <a href="#">
                <div class="card card-img card-img-link" style="background-image: url('storage/images/static/eden_house.jpg');">
                    <div><p>Visit</p></div>
                </div>
            </a>
            <a href="#">
                <div class="card card-img card-img-link" style="background-image: url('storage/images/static/eden_house.jpg');">
                    <div><p>Visit</p></div>
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
                    <h4>Title</h4>
                    <img src="storage/images/static/client.png" alt="">
                </a>
            </div>
            <div class="card card-img-sm-txt card-clickable">
                <a href="#">
                    <h4>Title</h4>
                    <img src="storage/images/static/client.png" alt="">
                </a>
            </div>
            <div class="card card-img-sm-txt card-clickable">
                <a href="#">
                    <h4>Title</h4>
                    <img src="storage/images/static/client.png" alt="">
                </a>
            </div>
            <div class="card card-img-sm-txt card-clickable">
                <a href="#">
                    <h4>Title</h4>
                    <img src="storage/images/static/client.png" alt="">
                </a>
            </div>
            <div class="card card-img-sm-txt card-clickable">
                <a href="#">
                    <h4>Title</h4>
                    <img src="storage/images/static/client.png" alt="">
                </a>
            </div>
            <div class="card card-img-sm-txt card-clickable">
                <a href="#">
                    <h4>Title</h4>
                    <img src="storage/images/static/client.png" alt="">
                </a>
            </div>
            <div class="card card-img-sm-txt card-clickable">
                <a href="#">
                    <h4>Title</h4>
                    <img src="storage/images/static/client.png" alt="">
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
                <div class="img" style="background: url('storage/images/static/pngegg.png');"></div>
                <div class="text">
                    <h3>Name</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et eligendi pariatur suscipit cupiditate recusandae in, sunt
                        blanditiis corrupti ipsam excepturi consectetur illum, rerum est id nemo quam animi amet voluptatibus quibusdam
                        quia. Accusantium optio, soluta pariatur aut maiores ex autem ipsam distinctio et quod! Eos labore nostrum inventore
                        voluptates nesciunt.</p>
                </div>
            </div>
            <div class="card card-img-circle-text">
                <div class="img" style="background: url('storage/images/static/pngegg.png');"></div>
                <div class="text">
                    <h3>Name</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et eligendi pariatur suscipit cupiditate recusandae in, sunt
                        blanditiis corrupti ipsam excepturi consectetur illum, rerum est id nemo quam animi amet voluptatibus quibusdam
                        quia. Accusantium optio, soluta pariatur aut maiores ex autem ipsam distinctio et quod! Eos labore nostrum inventore
                        voluptates nesciunt.</p>
                </div>
            </div>
            <div class="card card-img-circle-text">
                <div class="img" style="background: url('storage/images/static/pngegg.png');"></div>
                <div class="text">
                    <h3>Name</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et eligendi pariatur suscipit cupiditate recusandae in, sunt
                        blanditiis corrupti ipsam excepturi consectetur illum, rerum est id nemo quam animi amet voluptatibus quibusdam
                        quia. Accusantium optio, soluta pariatur aut maiores ex autem ipsam distinctio et quod! Eos labore nostrum inventore
                        voluptates nesciunt.</p>
                </div>
            </div>
        </div>
        <div class="quote">
            <h3><q>In design, there is no such thing as “rules”. There is, however, common sense.</q></h3>
        </div>
        <div class="about-grp grid-40-60">
            <div class="card card-form">
                <h2>Get in touch</h2>
                <form action="">
                    <div class="form-control">
                        <input type="text" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-control">
                        <input type="email" name="email" placeholder="Email address" required>
                    </div>
                    <div class="form-control">
                        <textarea type="text" name="message" placeholder="Message" rows="4" required></textarea>
                    </div>
                </form>
                <div class="physical">
                    <p>Greenhouse Mall, along Ngong Road,</p>
                    <p>4th floor Suite 10</p>
                </div>
            </div>
            <p class="text">Causam Branding Company is as a result of a lack of proper brand development strategies among local SMEs
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
