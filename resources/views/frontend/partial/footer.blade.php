<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand"><img
                    src="{{ isset($settings->logo) ? asset('images/logo/' . $settings->logo) : 'https://via.placeholder.com/50' }}"
                    alt="TechMentor logo">
                <p>Connecting expertise and ambition through trusted technology mentorship, advisory and
                    consultancy.</p>
            </div>
            <div>
                <h4>Explore</h4><a href="#individuals">For Individuals</a><a href="#organizations">For
                    Organizations</a><a href="#services">Our Services</a>
            </div>
            <div>
                <h4>Our Principles</h4><a href="#confidentiality">Trust & Confidentiality</a><a href="#about">Our
                    Approach</a><a href="#about">Professional Growth</a>
            </div>
            <div>
                <h4>Get in Touch</h4><a href="#contact">General Enquiry</a><a href="#contact">Mentorship
                    Enquiry</a><a href="#contact">Corporate Enquiry</a>
            </div>
        </div>
        <div class="copyright"><span>© <span id="year"></span> TechMentor. All rights
                reserved.</span><span>TRUST · TECHNOLOGY · MENTORSHIP · GROWTH</span></div>
    </div>
</footer>
