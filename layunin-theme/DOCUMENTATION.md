# 🏛️ Layunin Premium Theme - Comprehensive Architectural Documentation (v9.4)

Welcome to the **Layunin Premium Theme**. This manual provides an exhaustive guide to the theme's architecture, customization engine, and navigation strategy.

---

## 🚀 Professional Installation & Setup

### 1. Theme Activation
1. Upload the `layunin-theme` directory to `/wp-content/themes/`.
2. Navigate to **Appearance > Themes** and click **Activate**.
3. **Automated Ecosystem Initialization:** Upon activation, the theme automatically generates 17 essential pages (Home, About, Services, Shop, etc.) with professional default content and structure.

### 2. Global Branding (Design System)
Access the **Elite Design System** panel in the Customizer to define your core brand identity:
- **Typography:** Choose between modern Inter, clean Roboto, or classic Open Sans.
- **Color Palette:** Set your Primary Midnight Navy (#050A18) and Elite Royal Gold (#C5A02B).
- **Global Roundedness:** Define the 'border-radius' (Default: 16px) for all UI components to ensure a consistent, premium feel.

---

## 🧭 Navigation & Menu Architecture

To maintain the high-trust, conversion-focused design, follow these menu structures. Navigate to **Appearance > Menus** to configure.

### A. Header Menu (Primary Navigation)
*The objective is to guide users through the transformation funnel.*

1. **Home** (Link: `/`)
2. **About** (Link: `/about/`)
3. **Mastery Areas** (Dropdown)
   - Goal Setting (Category Link)
   - Online Income (Category Link)
   - Productivity (Category Link)
   - AI Mastery (Category Link)
4. **Resources** (Link: `/free-resources/`)
5. **Shop** (Link: `/shop/`)
6. **Services** (Link: `/services/`)
7. **Contact** (Link: `/contact/`)
8. **CTA Button:** Managed via Customizer (**Header & Navigation > CTA Button Text**). Usually points to `/lead-magnet/` or `/services/`.

### B. Footer Menu (Utility & Trust)
*The objective is to provide site-wide utility and legal compliance.*

**Column 1: Site Branding** (Automatic)
**Column 2: Mastery Area**
- All Posts
- Success Stories (Category)
- Elite Mindset (Category)
- Scalable Business (Category)
**Column 3: Resources**
- Free 7-Day Protocol
- Knowledge Vault
- FAQs
- Testimonials
**Column 4: Legal & Compliance**
- Privacy Policy
- Terms & Conditions
- Affiliate Disclosure

---

## 🛠️ Content Management & The Customizer Engine

The Layunin theme is **100% manageable**. Every text string, image, and section visibility toggle is centralized in the WordPress Customizer.

### 🏠 Homepage Construction (Modular Architecture)
The homepage is composed of 13 high-conversion sections:
1. **Hero Section:** Persuasive headline and dual-action buttons.
2. **Featured Posts:** Highlight your "Elite" content.
3. **Trust Badges:** Logo bar for authority.
4. **Process Section:** Your 3-step "Elite Protocol."
5. **Features:** Why high-achievers choose your platform.
6. **Problem/Solution:** Direct address of audience pain points.
7. **Categories:** Visual navigation to mastery areas.
8. **Lead Magnet:** The 7-Day Goal Reset Protocol capture.
9. **Products/Services:** Monetization modules.
10. **Testimonials:** Masonry "Wall of Impact."

### 📄 Inner Page Templates
17 dynamic templates are included. Each has dedicated Customizer controls for headlines, badges, and lead copy.

---

## 💰 Monetization Strategy

- **Ad Banners:** Global controls for banners above/below content.
- **Affiliate Integration:** Dedicated disclosure template and global affiliate banner settings.
- **Lead Capture:** Exit-intent popup (Customizer > Lead Popup) and integrated newsletter widgets.

---

## 💎 Shortcode Reference Library

| Shortcode | Purpose | Example |
| :--- | :--- | :--- |
| `[cta_box]` | Highlighted call-to-action | `[cta_box title="Title" button_text="Join"]` |
| `[pricing_table]` | 3-tier product comparison | Wrap `[pricing_item]` shortcodes |
| `[faq_page]` | Interactive accordion FAQ | Wrap `[faq_item]` shortcodes |
| `[benefit_list]` | List of features/outcomes | Wrap `[benefit_item]` shortcodes |

---

## 📞 Support & Architectural Credits
- **Architect:** Jules (Layunin Lead Software Engineer)
- **Technology Stack:** PHP 8+, Bootstrap 5.3, FontAwesome 6.
- **Contact:** hello@layunin.com

*© 2024 Layunin.com. Architecting the next generation of Filipino excellence.*
