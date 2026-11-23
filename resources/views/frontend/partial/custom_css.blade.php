<style>
    :root {
        --navy: #082f75;
        --blue: #1689e8;
        --aqua: #42cbd0;
        --green: #08ad50;
        --ink: #10234a;
        --muted: #52627c;
        --pale: #f3f8ff;
        --line: #dce8f5;
        --shadow: 0 18px 48px rgba(8, 47, 117, .10)
    }

    * {
        box-sizing: border-box
    }

    html {
        scroll-behavior: smooth
    }

    body {
        margin: 0;
        font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Arial, sans-serif;
        color: var(--ink);
        background: #fff
    }

    a {
        color: inherit;
        text-decoration: none
    }

    .container {
        width: min(1180px, calc(100% - 40px));
        margin: auto
    }

    .topbar {
        position: sticky;
        top: 0;
        z-index: 20;
        background: rgba(255, 255, 255, .94);
        backdrop-filter: blur(14px);
        border-bottom: 1px solid #e8eff8
    }

    .nav {
        height: 82px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 28px
    }

    .brand img {
        display: block;
        width: 230px;
        height: auto;
        max-height: 65px;
        object-fit: contain;
        object-position: left center
    }

    .navlinks {
        display: flex;
        align-items: center;
        gap: 27px;
        font-size: 14px;
        font-weight: 700;
        color: #263957
    }

    .navlinks a:hover,
    .nav-group-button:hover {
        color: var(--green)
    }

    .nav-group {
        position: relative
    }

    .nav-group-button {
        border: 0;
        background: transparent;
        color: #263957;
        font: inherit;
        font-weight: 750;
        cursor: pointer;
        padding: 12px 0;
        display: flex;
        align-items: center;
        gap: 7px;
        white-space: nowrap
    }

    .nav-group-button span {
        margin-top: -12px;
        font-size: 17px;
        line-height: 10px;
        color: #6b7d98
    }

    .nav-submenu {
        position: absolute;
        top: 100%;
        left: -18px;
        min-width: 245px;
        padding: 10px;
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 15px;
        box-shadow: 0 18px 42px rgba(8, 47, 117, .15);
        display: none;
        z-index: 40
    }

    .nav-submenu.wide {
        min-width: 290px
    }

    .nav-group:hover>.nav-submenu {
        display: block
    }

    .nav-submenu a {
        display: block;
        padding: 10px 12px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 650;
        color: #344766;
        white-space: nowrap
    }

    .nav-submenu a:hover {
        background: #f1f8ff;
        color: var(--green)
    }

    .submenu-heading,
    .register-menu-heading {
        padding: 8px 12px 9px;
        color: #8291a8;
        font-size: 10px;
        font-weight: 900;
        letter-spacing: .12em;
        text-transform: uppercase
    }

    .mobile-register-group {
        display: none
    }

    .navactions {
        display: flex;
        gap: 10px;
        align-items: center
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 13px 21px;
        border-radius: 12px;
        font-weight: 800;
        font-size: 14px;
        border: 1px solid transparent;
        transition: .2s;
        cursor: pointer
    }

    .btn-primary {
        background: linear-gradient(100deg, #079d49, #0bbd58);
        color: white;
        box-shadow: 0 8px 18px rgba(8, 173, 80, .18)
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 22px rgba(8, 173, 80, .24)
    }

    .btn-outline {
        border-color: #b8cce7;
        color: var(--navy);
        background: white
    }

    .btn-outline:hover {
        border-color: var(--blue);
        background: #f4f9ff
    }

    .menu-toggle {
        display: none;
        border: 1px solid var(--line);
        background: white;
        border-radius: 10px;
        padding: 9px 12px;
        font-size: 20px;
        color: var(--navy)
    }

    .register-wrap {
        position: relative
    }

    .register-menu {
        position: absolute;
        right: 0;
        top: calc(100% + 12px);
        width: 300px;
        padding: 9px;
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 17px;
        box-shadow: 0 18px 45px rgba(8, 47, 117, .17);
        display: none;
        z-index: 30
    }

    .register-menu.open {
        display: block
    }

    .register-option {
        display: flex;
        gap: 13px;
        align-items: center;
        padding: 13px 12px;
        border-radius: 12px;
        color: var(--navy);
        cursor: pointer
    }

    .register-option:hover {
        background: #f2f8ff
    }

    .register-option+.register-option {
        border-top: 1px solid #edf2f8
    }

    .register-option .option-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 21px;
        background: #eaf4ff;
        color: var(--blue);
        flex: none
    }

    .register-option:nth-of-type(2) .option-icon {
        background: #eaf9f0;
        color: var(--green)
    }

    .register-option:nth-of-type(3) .option-icon {
        background: #e8f8f7;
        color: #079b8d
    }

    .register-option strong {
        display: block;
        font-size: 14px
    }

    .register-option small {
        display: block;
        color: var(--muted);
        font-size: 11px;
        margin-top: 3px
    }

    .registration {
        padding: 76px 0;
        background: linear-gradient(180deg, #f7fbff, #fff)
    }

    .registration-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px
    }

    .registration-card {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 22px;
        padding: 27px;
        box-shadow: 0 12px 30px rgba(8, 47, 117, .07);
        display: flex;
        flex-direction: column;
        min-height: 270px;
        transition: .2s
    }

    .registration-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow)
    }

    .registration-card .reg-icon {
        width: 58px;
        height: 58px;
        border-radius: 17px;
        background: #eaf4ff;
        color: var(--blue);
        display: grid;
        place-items: center;
        font-size: 28px;
        margin-bottom: 17px
    }

    .registration-card.mentee .reg-icon {
        background: #eaf9f0;
        color: var(--green)
    }

    .registration-card.org .reg-icon {
        background: #e8f8f7;
        color: #079b8d
    }

    .registration-card h3 {
        color: var(--navy);
        font-size: 21px;
        margin: 0 0 9px
    }

    .registration-card p {
        color: var(--muted);
        font-size: 13px;
        line-height: 1.6;
        margin: 0 0 20px;
        flex: 1
    }

    .registration-card .btn {
        width: 100%
    }

    .registration-note {
        text-align: center;
        color: var(--muted);
        font-size: 12px;
        margin-top: 20px
    }

    .modal-backdrop {
        position: fixed;
        inset: 0;
        background: rgba(4, 20, 52, .62);
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
        z-index: 100
    }

    .modal-backdrop.open {
        display: flex
    }

    .reg-modal {
        background: #fff;
        border-radius: 22px;
        width: min(100%, 560px);
        max-height: 90vh;
        overflow: auto;
        box-shadow: 0 25px 80px rgba(0, 0, 0, .25);
        padding: 28px
    }

    .modal-head {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 20px
    }

    .modal-head h2 {
        margin: 0;
        color: var(--navy);
        font-size: 25px
    }

    .modal-head p {
        margin: 6px 0 0;
        color: var(--muted);
        font-size: 13px
    }

    .modal-close {
        border: 0;
        background: #eef4fb;
        color: var(--navy);
        border-radius: 10px;
        width: 36px;
        height: 36px;
        font-size: 22px;
        cursor: pointer
    }

    .reg-form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 13px
    }

    .reg-form label {
        font-size: 12px;
        font-weight: 800;
        color: #294064
    }

    .reg-form input,
    .reg-form select,
    .reg-form textarea {
        width: 100%;
        margin-top: 6px;
        padding: 12px;
        border: 1px solid #cbd9e9;
        border-radius: 10px;
        font: inherit;
        font-size: 14px;
        background: white
    }

    .reg-form .full {
        grid-column: 1/-1
    }

    .reg-form button {
        grid-column: 1/-1
    }

    .form-note {
        font-size: 11px;
        color: #71809a;
        line-height: 1.5;
        margin: 13px 0 0
    }

    .nav-register-mobile {
        display: none
    }

    .hero {
        position: relative;
        overflow: hidden;
        background: radial-gradient(circle at 85% 20%, #e2f5ff 0, transparent 30%), linear-gradient(115deg, #f7fbff, #fff 52%, #f0fbf7);
        padding: 78px 0 70px
    }

    .hero:before {
        content: "";
        position: absolute;
        width: 520px;
        height: 520px;
        border: 65px solid rgba(22, 137, 232, .07);
        border-radius: 50%;
        right: -190px;
        top: -280px
    }

    .hero-grid {
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        gap: 52px;
        align-items: center;
        position: relative
    }

    .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--green);
        font-size: 12px;
        font-weight: 900;
        letter-spacing: .14em;
        text-transform: uppercase;
        margin-bottom: 18px
    }

    .eyebrow:before {
        content: "";
        width: 25px;
        height: 2px;
        background: var(--green)
    }

    h1 {
        font-size: clamp(40px, 5vw, 66px);
        line-height: 1.04;
        letter-spacing: -.045em;
        color: var(--navy);
        margin: 0 0 22px;
        font-weight: 850
    }

    .hero h1 span {
        color: var(--green)
    }

    .hero-copy {
        font-size: 18px;
        line-height: 1.7;
        color: #455775;
        max-width: 590px;
        margin: 0 0 29px
    }

    .hero-buttons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap
    }

    .hero-points {
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
        margin-top: 34px;
        color: #29436a;
        font-size: 13px;
        font-weight: 750
    }

    .hero-points span {
        display: flex;
        align-items: center;
        gap: 8px
    }

    .tick {
        color: var(--green);
        font-weight: 900;
        font-size: 18px
    }

    .hero-visual {
        position: relative;
        min-height: 400px;
        display: grid;
        place-items: center
    }

    .visual-card {
        width: min(100%, 480px);
        aspect-ratio: 1.12;
        border-radius: 36px;
        background: linear-gradient(140deg, #d9f1ff, #effcf5);
        box-shadow: var(--shadow);
        position: relative;
        overflow: hidden;
        border: 1px solid #fff
    }

    .visual-card:before,
    .visual-card:after {
        content: "";
        position: absolute;
        border-radius: 50%;
        border: 1px solid rgba(22, 137, 232, .16)
    }

    .visual-card:before {
        width: 320px;
        height: 320px;
        right: -80px;
        top: -100px
    }

    .visual-card:after {
        width: 230px;
        height: 230px;
        left: -75px;
        bottom: -110px
    }

    .mentor-illustration {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 14px
    }

    .person {
        width: 38%;
        height: 65%;
        border-radius: 46% 46% 18px 18px;
        background: linear-gradient(145deg, #0c3b7d, #1689e8);
        position: relative;
        box-shadow: 0 16px 25px rgba(8, 47, 117, .18)
    }

    .person:before {
        content: "";
        position: absolute;
        width: 48%;
        aspect-ratio: 1;
        border-radius: 50%;
        background: #f0c5a5;
        top: -22%;
        left: 26%;
        box-shadow: inset -8px -5px 0 rgba(90, 48, 34, .08)
    }

    .person.second {
        height: 58%;
        background: linear-gradient(145deg, #087c55, #10bd78);
        transform: translateY(12px)
    }

    .person.second:before {
        background: #dcae8c
    }

    .screen {
        position: absolute;
        bottom: 15%;
        left: 30%;
        width: 42%;
        height: 25%;
        background: #f9fcff;
        border: 9px solid #183d72;
        border-bottom-width: 13px;
        border-radius: 12px;
        box-shadow: 0 10px 15px rgba(8, 47, 117, .15)
    }

    .screen:after {
        content: "</>";
        display: grid;
        place-items: center;
        height: 100%;
        font-weight: 900;
        font-size: 28px;
        color: var(--blue)
    }

    .float-tag {
        position: absolute;
        padding: 12px 16px;
        border-radius: 14px;
        background: #fff;
        box-shadow: 0 10px 25px rgba(8, 47, 117, .12);
        font-size: 13px;
        font-weight: 800;
        color: var(--navy)
    }

    .float-tag.one {
        top: 13%;
        left: 7%
    }

    .float-tag.two {
        right: 5%;
        bottom: 14%;
        color: var(--green)
    }

    .trust-strip {
        background: #fff;
        padding: 26px 0
    }

    .strip-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        border: 1px solid var(--line);
        border-radius: 18px;
        overflow: hidden;
        background: #fbfdff
    }

    .strip-item {
        padding: 22px 20px;
        display: flex;
        align-items: center;
        gap: 13px;
        border-right: 1px solid var(--line)
    }

    .strip-item:last-child {
        border: 0
    }

    .strip-icon {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        background: #eaf5ff;
        color: var(--blue);
        display: grid;
        place-items: center;
        font-size: 21px;
        font-weight: 900
    }

    .strip-item strong {
        display: block;
        color: var(--navy);
        font-size: 14px
    }

    .strip-item small {
        display: block;
        color: var(--muted);
        font-size: 12px;
        margin-top: 3px
    }

    section {
        scroll-margin-top: 95px
    }

    .section {
        padding: 78px 0
    }

    .section-head {
        text-align: center;
        max-width: 760px;
        margin: 0 auto 38px
    }

    .kicker {
        color: var(--green);
        font-weight: 900;
        font-size: 12px;
        letter-spacing: .14em;
        text-transform: uppercase
    }

    .section h2 {
        font-size: clamp(30px, 3.3vw, 43px);
        line-height: 1.12;
        color: var(--navy);
        letter-spacing: -.03em;
        margin: 12px 0
    }

    .section-head p {
        color: var(--muted);
        line-height: 1.7;
        margin: 0
    }

    .audience-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px
    }

    .audience-card {
        border-radius: 26px;
        padding: 32px;
        border: 1px solid #d7e9f8;
        box-shadow: var(--shadow);
        position: relative;
        overflow: hidden
    }

    .audience-card.individual {
        background: linear-gradient(135deg, #e8f6ff, #f7fcff)
    }

    .audience-card.organization {
        background: linear-gradient(135deg, #e8fbf1, #f8fffb);
        border-color: #d6f0df
    }

    .audience-top {
        display: flex;
        align-items: center;
        gap: 18px;
        margin-bottom: 23px
    }

    .audience-symbol {
        width: 66px;
        height: 66px;
        border-radius: 19px;
        background: #fff;
        color: var(--blue);
        display: grid;
        place-items: center;
        font-size: 30px;
        box-shadow: 0 8px 18px rgba(8, 47, 117, .08)
    }

    .organization .audience-symbol {
        color: var(--green)
    }

    .audience-card h3 {
        font-size: 25px;
        margin: 0 0 7px;
        color: var(--navy)
    }

    .pill {
        display: inline-block;
        background: var(--green);
        color: #fff;
        padding: 8px 13px;
        border-radius: 99px;
        font-size: 12px;
        font-weight: 850
    }

    .audience-card ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        gap: 13px
    }

    .audience-card li {
        display: flex;
        gap: 11px;
        align-items: flex-start;
        color: #243858;
        font-size: 14px;
        font-weight: 650;
        line-height: 1.45
    }

    .audience-card li:before {
        content: "✓";
        color: var(--green);
        font-size: 18px;
        font-weight: 1000;
        line-height: 1
    }

    .service-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px
    }

    .service {
        padding: 25px;
        border: 1px solid var(--line);
        border-radius: 18px;
        background: white;
        transition: .2s
    }

    .service:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow);
        border-color: #b9d8f4
    }

    .service-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: #eef7ff;
        color: var(--blue);
        display: grid;
        place-items: center;
        font-size: 23px;
        margin-bottom: 17px
    }

    .service h3 {
        margin: 0 0 8px;
        color: var(--navy);
        font-size: 17px
    }

    .service p {
        margin: 0;
        color: var(--muted);
        font-size: 13px;
        line-height: 1.65
    }

    .service-audience-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        align-items: stretch
    }

    .service-audience {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 28px rgba(8, 47, 117, .06);
        display: flex;
        flex-direction: column;
        min-width: 0
    }

    .service-audience.mentor-services {
        border-top: 4px solid var(--blue)
    }

    .service-audience.mentee-services {
        border-top: 4px solid var(--green)
    }

    .service-audience.org-services {
        border-top: 4px solid #079b8d
    }

    .service-audience-head {
        display: flex;
        gap: 13px;
        align-items: flex-start;
        margin-bottom: 15px
    }

    .service-audience-icon {
        width: 48px;
        height: 48px;
        flex: none;
        border-radius: 14px;
        background: #eaf4ff;
        color: var(--blue);
        display: grid;
        place-items: center;
        font-size: 25px
    }

    .mentee-services .service-audience-icon {
        background: #eaf9f0;
        color: var(--green)
    }

    .org-services .service-audience-icon {
        background: #e8f8f7;
        color: #079b8d
    }

    .service-label {
        font-size: 10px;
        font-weight: 900;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: var(--muted)
    }

    .service-audience h3 {
        font-size: 21px;
        color: var(--navy);
        margin: 3px 0 5px
    }

    .service-audience-head p {
        font-size: 12px;
        line-height: 1.5;
        color: var(--muted);
        margin: 0
    }

    .service-audience ul {
        list-style: none;
        padding: 0;
        margin: 8px 0 20px;
        display: grid;
        gap: 13px;
        flex: 1
    }

    .service-audience li {
        padding-left: 17px;
        position: relative
    }

    .service-audience li:before {
        content: "✓";
        position: absolute;
        left: 0;
        top: 0;
        color: var(--green);
        font-weight: 900
    }

    .service-audience li strong {
        display: block;
        font-size: 13px;
        color: #20395f
    }

    .service-audience li span {
        display: block;
        font-size: 11px;
        color: var(--muted);
        line-height: 1.45;
        margin-top: 2px
    }

    .service-more {
        font-size: 13px;
        font-weight: 850;
        color: var(--green);
        padding-top: 13px;
        border-top: 1px solid #edf2f8
    }

    .service-menu {
        display: grid;
        grid-template-columns: 1fr;
        min-width: 250px;
        overflow: visible
    }

    .service-menu-group {
        position: relative
    }

    .service-menu-group+.service-menu-group {
        border-top: 1px solid #edf2f8
    }

    .service-menu-trigger {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        padding: 13px 12px;
        border: 0;
        border-radius: 9px;
        background: #fff;
        color: #20395f;
        font: inherit;
        font-size: 13px;
        font-weight: 800;
        text-align: left;
        cursor: pointer
    }

    .service-menu-trigger span {
        font-size: 20px;
        color: #7b8da8
    }

    .service-menu-trigger:hover,
    .service-menu-group:hover>.service-menu-trigger,
    .service-menu-group:focus-within>.service-menu-trigger,
    .service-menu-group.expanded>.service-menu-trigger {
        background: #f1f8ff;
        color: var(--green)
    }

    .service-submenu {
        position: absolute;
        left: calc(100% - 1px);
        top: -8px;
        min-width: 285px;
        padding: 9px;
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 14px;
        box-shadow: 0 18px 42px rgba(8, 47, 117, .15);
        display: none;
        z-index: 45
    }

    .service-menu-group:hover>.service-submenu {
        display: block
    }

    .service-submenu a {
        white-space: normal
    }

    .service-menu-nested {
        position: relative;
        border-top: 1px solid #edf2f8;
        border-bottom: 1px solid #edf2f8
    }

    .service-menu-parent {
        display: flex !important;
        justify-content: space-between;
        align-items: center;
        font-weight: 850 !important;
        color: var(--green) !important
    }

    .service-menu-nested-items {
        display: none;
        position: absolute;
        right: calc(100% - 1px);
        left: auto;
        top: -8px;
        min-width: 285px;
        padding: 9px;
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 14px;
        box-shadow: 0 18px 42px rgba(8, 47, 117, .15);
        z-index: 46
    }

    .service-menu-nested:hover>.service-menu-nested-items,
    .service-menu-nested:focus-within>.service-menu-nested-items {
        display: block
    }

    .audit-service-group {
        padding-left: 17px !important
    }

    .audit-service-group:before {
        content: "✓";
        position: absolute;
        left: 0;
        top: 0;
        color: var(--green);
        font-weight: 900
    }

    .audit-subservices {
        list-style: none;
        padding: 10px 0 0 14px !important;
        margin: 10px 0 0 !important;
        border-left: 2px solid #dceaf8;
        display: grid;
        gap: 11px !important
    }

    .audit-subservices li {
        padding-left: 14px !important
    }

    .audit-subservices li:before {
        content: "•";
        color: var(--blue);
        left: 0
    }

    .audit-subservices li strong {
        font-size: 12px
    }

    .audit-subservices li span {
        font-size: 11px
    }

    .service-menu .submenu-heading {
        padding-bottom: 3px
    }

    .confidential {
        padding: 54px 0;
        background: linear-gradient(115deg, #06245d, #0a478b);
        color: white;
        position: relative;
        overflow: hidden
    }

    .confidential:after {
        content: "";
        position: absolute;
        width: 500px;
        height: 500px;
        border: 1px solid rgba(255, 255, 255, .1);
        border-radius: 50%;
        right: -120px;
        top: -300px;
        box-shadow: 0 0 0 35px rgba(255, 255, 255, .025), 0 0 0 75px rgba(255, 255, 255, .02)
    }

    .conf-grid {
        display: grid;
        grid-template-columns: .9fr 1.1fr;
        gap: 42px;
        align-items: center;
        position: relative;
        z-index: 1
    }

    .conf-title {
        display: flex;
        align-items: center;
        gap: 20px
    }

    .shield {
        width: 76px;
        height: 76px;
        border: 2px solid #59d98c;
        border-radius: 22px;
        display: grid;
        place-items: center;
        font-size: 34px;
        color: #6bf09c
    }

    .conf-title h2 {
        font-size: 32px;
        line-height: 1.1;
        margin: 0;
        color: white
    }

    .conf-title p {
        color: #b8d9f7;
        margin: 8px 0 0;
        font-size: 13px
    }

    .conf-list {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px 25px
    }

    .conf-list div {
        display: flex;
        gap: 10px;
        align-items: flex-start;
        color: #edf7ff;
        font-size: 14px;
        font-weight: 650
    }

    .conf-list b {
        color: #34df78
    }

    .process-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px
    }

    .process {
        padding: 23px;
        border-radius: 18px;
        background: #f7faff;
        border: 1px solid var(--line)
    }

    .process .num {
        font-size: 12px;
        color: var(--green);
        font-weight: 900;
        letter-spacing: .12em
    }

    .process h3 {
        font-size: 17px;
        color: var(--navy);
        margin: 12px 0 8px
    }

    .process p {
        font-size: 13px;
        line-height: 1.6;
        color: var(--muted);
        margin: 0
    }

    .cta {
        padding: 72px 0;
        background: linear-gradient(110deg, #eaf6ff, #f1fff6)
    }

    .cta-box {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 25px
    }

    .cta h2 {
        font-size: clamp(28px, 3.5vw, 42px);
        color: var(--navy);
        margin: 0 0 10px
    }

    .cta p {
        margin: 0;
        color: var(--muted);
        line-height: 1.6
    }

    .footer {
        background: #061d49;
        color: #dbe8fa;
        padding: 48px 0 22px
    }

    .footer-grid {
        display: grid;
        grid-template-columns: 1.5fr 1fr 1fr 1fr;
        gap: 35px
    }

    .footer-brand img {
        width: 230px;
        max-height: 72px;
        object-fit: contain;
        object-position: left center;
        background: #fff;
        border-radius: 10px;
        padding: 5px
    }

    .footer p {
        font-size: 13px;
        line-height: 1.7;
        color: #b6c9e4;
        max-width: 320px
    }

    .footer h4 {
        color: white;
        margin: 0 0 15px
    }

    .footer a {
        display: block;
        color: #c8d7eb;
        font-size: 13px;
        margin: 10px 0
    }

    .footer a:hover {
        color: #54df8a
    }

    .copyright {
        border-top: 1px solid rgba(255, 255, 255, .14);
        margin-top: 35px;
        padding-top: 18px;
        color: #9eb4d2;
        font-size: 12px;
        display: flex;
        justify-content: space-between;
        gap: 15px
    }

    @media(max-width:980px) {
        .navlinks {
            gap: 13px
        }

        .register-wrap .btn {
            padding: 11px 14px
        }

        .registration-grid {
            gap: 14px
        }

        .registration-card {
            padding: 22px
        }
    }

    @media(max-width:760px) {
        .nav-group.expanded>.nav-submenu {
            display: block
        }

        .service-menu-group.expanded>.service-submenu {
            display: block
        }

        .service-menu-nested-items {
            position: static;
            min-width: 0;
            box-shadow: none;
            border: 0;
            border-left: 2px solid #dceaf8;
            border-radius: 0;
            margin: 2px 0 8px 8px;
            padding: 4px 8px 6px
        }

        .service-menu-nested:focus-within>.service-menu-nested-items {
            display: block
        }

        .service-submenu {
            position: static;
            min-width: 0;
            box-shadow: none;
            border: 0;
            border-left: 2px solid #dceaf8;
            border-radius: 0;
            margin: 2px 0 8px 8px;
            padding: 4px 8px 6px
        }

        .service-menu-trigger {
            padding: 10px 12px
        }

        .service-menu-trigger span {
            transform: rotate(90deg)
        }

        .register-wrap {
            display: none
        }

        .mobile-register-group {
            display: block;
            width: 100%;
            border-top: 1px solid var(--line);
            margin-top: 8px;
            padding-top: 8px
        }

        .mobile-register-group a {
            display: block;
            color: var(--green) !important;
            font-weight: 850;
            padding: 10px 12px
        }

        .nav-submenu {
            position: static;
            box-shadow: none;
            border: 0;
            border-left: 2px solid #dceaf8;
            border-radius: 0;
            margin: 2px 0 8px 8px;
            padding: 4px 8px 6px;
            min-width: 0
        }

        .nav-submenu.wide {
            min-width: 0
        }

        .nav-group {
            width: 100%
        }

        .nav-group-button {
            width: 100%;
            justify-content: space-between;
            padding: 10px 0;
            font-size: 14px
        }

        .nav-submenu a {
            white-space: normal
        }

        .nav-register-mobile {
            display: block !important;
            color: var(--green) !important;
            font-weight: 900
        }

        .registration-grid {
            grid-template-columns: 1fr
        }

        .registration-card {
            min-height: 0
        }

        .reg-modal {
            padding: 22px
        }
    }

    @media(max-width:980px) {
        .navlinks {
            gap: 15px
        }

        .navlinks a {
            font-size: 12px
        }

        .brand img {
            width: 190px
        }

        .hero-grid {
            gap: 25px
        }

        .strip-grid {
            grid-template-columns: 1fr 1fr
        }

        .strip-item:nth-child(2) {
            border-right: 0
        }

        .strip-item:nth-child(-n+2) {
            border-bottom: 1px solid var(--line)
        }

        .process-grid {
            grid-template-columns: 1fr 1fr
        }
    }

    @media(max-width:760px) {
        .container {
            width: min(100% - 30px, 600px)
        }

        .nav {
            height: 72px
        }

        .brand img {
            width: 180px
        }

        .menu-toggle {
            display: block
        }

        .navlinks {
            display: none;
            position: absolute;
            top: 72px;
            left: 0;
            right: 0;
            padding: 18px 22px 22px;
            background: white;
            border-bottom: 1px solid var(--line);
            box-shadow: 0 12px 20px rgba(8, 47, 117, .08);
            flex-direction: column;
            align-items: flex-start
        }

        .navlinks.open {
            display: flex
        }

        .navactions .btn-outline {
            display: none
        }

        .navactions .btn {
            padding: 10px 13px;
            font-size: 12px
        }

        .hero {
            padding: 55px 0 48px
        }

        .hero-grid {
            grid-template-columns: 1fr
        }

        .hero-visual {
            min-height: 300px;
            order: -1
        }

        .visual-card {
            max-width: 420px
        }

        .hero-copy {
            font-size: 16px
        }

        .hero-points {
            gap: 14px
        }

        .strip-grid {
            grid-template-columns: 1fr 1fr
        }

        .strip-item {
            padding: 16px 12px
        }

        .audience-grid {
            grid-template-columns: 1fr
        }

        .audience-card {
            padding: 24px
        }

        .service-grid {
            grid-template-columns: 1fr 1fr
        }

        .service-audience-grid {
            grid-template-columns: 1fr 1fr
        }

        .conf-grid {
            grid-template-columns: 1fr;
            gap: 28px
        }

        .conf-list {
            grid-template-columns: 1fr
        }

        .cta-box {
            align-items: flex-start;
            flex-direction: column
        }

        .footer-grid {
            grid-template-columns: 1fr 1fr
        }

        .footer-brand {
            grid-column: 1/-1
        }

        .copyright {
            flex-direction: column
        }
    }

    /* Service navigation: hidden by default; reveal only while hovering (desktop). */
    @media(min-width:761px) {
        .nav-group>.nav-submenu {
            display: none !important
        }

        .nav-group:hover>.nav-submenu {
            display: block !important
        }

        .nav-group:focus-within>.nav-submenu {
            display: block !important
        }
    }

    @media(max-width:760px) {
        .nav-group>.nav-submenu {
            display: none !important
        }

        .nav-group.expanded>.nav-submenu {
            display: block !important
        }
    }

    @media(max-width:440px) {
        .navactions .btn-primary {
            padding: 10px 11px
        }

        .brand img {
            width: 148px
        }

        .hero-buttons .btn {
            width: 100%
        }

        .hero-visual {
            min-height: 245px
        }

        .float-tag {
            font-size: 11px;
            padding: 9px 11px
        }

        .strip-grid {
            grid-template-columns: 1fr
        }

        .strip-item {
            border-right: 0 !important;
            border-bottom: 1px solid var(--line)
        }

        .strip-item:last-child {
            border-bottom: 0
        }

        .service-grid,
        .process-grid,
        .service-audience-grid {
            grid-template-columns: 1fr
        }

        .audience-top {
            align-items: flex-start
        }

        .audience-card h3 {
            font-size: 21px
        }

        .footer-grid {
            grid-template-columns: 1fr
        }
    }
</style>
