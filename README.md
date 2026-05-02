# SilverStripe SuperLinker Targets

Basic link/target DataObjects built on SuperLinker foundation.

## Overview

Provides a `Target` class that extends `SuperLink` for general-purpose link objects. Useful for:
- Related links
- Resource links
- Navigation links
- Any generic link collection

## Requirements

* SilverStripe Framework ^6.0
* fromholdio/silverstripe-superlinker ^4.0.0

## Installation

```bash
composer require fromholdio/silverstripe-superlinker-targets
```

Run dev/build:
```bash
vendor/bin/sake dev/build flush=1
```

## Usage

### Basic Usage

```php
use Fromholdio\SuperLinkerTargets\Model\Target;

class Page extends SiteTree
{
    private static $has_many = [
        'RelatedLinks' => Target::class
    ];
}
```

### CMS Fields

```php
use Fromholdio\MiniGridField\MiniGridField;

public function getCMSFields(): FieldList
{
    $fields = parent::getCMSFields();

    $fields->addFieldToTab('Root.Links',
        MiniGridField::create('RelatedLinks', 'Related Links', $this)
            ->setLimit(10)
    );

    return $fields;
}
```

### Templates

```html
<% if $RelatedLinks %>
    <div class="related-links">
        <h3>Related Links</h3>
        <ul>
            <% loop $RelatedLinks %>
                <li>
                    <a href="$URL" $AttributesHTML>$Title</a>
                </li>
            <% end_loop %>
        </ul>
    </div>
<% end_if %>
```

## Usage Examples

### Example 1: Footer Links

```php
namespace App\Extensions;

use Fromholdio\SuperLinkerTargets\Model\Target;
use SilverStripe\Core\Extension;

class SiteConfigExtension extends Extension
{
    private static $has_many = [
        'FooterLinks' => Target::class
    ];
}
```

```yaml
SilverStripe\SiteConfig\SiteConfig:
  extensions:
    - App\Extensions\SiteConfigExtension
```

**Template**:
```html
<footer>
    <nav class="footer-nav">
        <% loop $SiteConfig.FooterLinks %>
            <a href="$URL" $AttributesHTML>$Title</a>
        <% end_loop %>
    </nav>
</footer>
```

### Example 2: Resource Links

```php
class ResourcePage extends Page
{
    private static $has_many = [
        'ResourceLinks' => Target::class
    ];

    public function getValidResourceLinks(): ArrayList
    {
        return Target::excludeInvalidLinks($this->ResourceLinks());
    }
}
```

**Template**:
```html
<% if $ValidResourceLinks %>
    <div class="resources">
        <h2>Resources</h2>
        <% loop $ValidResourceLinks %>
            <div class="resource-item">
                <a href="$URL" $AttributesHTML>
                    <strong>$Title</strong>
                    <% if $Description %>
                        <p>$Description</p>
                    <% end_if %>
                </a>
            </div>
        <% end_loop %>
    </div>
<% end_if %>
```

### Example 3: Social Media Links

```php
namespace App\Extensions;

use Fromholdio\SuperLinkerTargets\Model\Target;
use SilverStripe\Core\Extension;

class SiteConfigExtension extends Extension
{
    private static $has_many = [
        'SocialLinks' => Target::class
    ];
}
```

**With Icons**:
```yaml
Fromholdio\SuperLinkerTargets\Model\Target:
  extensions:
    - Fromholdio\SuperLinker\Extensions\SuperLinkIconExtension
```

**Template**:
```html
<div class="social-links">
    <% loop $SiteConfig.SocialLinks %>
        <a href="$URL" target="_blank" rel="noopener" class="social-link">
            <% if $Icon %>
                <img src="$Icon.URL" alt="$Title">
            <% else %>
                $Title
            <% end_if %>
        </a>
    <% end_loop %>
</div>
```

### Example 4: Card Links with Images

```yaml
Fromholdio\SuperLinkerTargets\Model\Target:
  extensions:
    - Fromholdio\SuperLinker\Extensions\SuperLinkImageExtension
    - Fromholdio\SuperLinker\Extensions\SuperLinkDescriptionExtension
```

```php
class HomePage extends Page
{
    private static $has_many = [
        'FeatureCards' => Target::class
    ];
}
```

**Template**:
```html
<div class="feature-cards">
    <% loop $FeatureCards %>
        <a href="$URL" class="card">
            <% if $Image %>
                <img src="$Image.FocusFill(400,300).URL" alt="$Title">
            <% end_if %>
            <div class="card-content">
                <h3>$Title</h3>
                <% if $Description %>
                    <p>$Description</p>
                <% end_if %>
            </div>
        </a>
    <% end_loop %>
</div>
```

## Customization

### Adding Custom Fields

Extend the Target class:

```php
namespace App\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Core\Extension;

class TargetExtension extends Extension
{
    private static $db = [
        'CustomField' => 'Varchar(255)'
    ];

    public function updateCMSFields(FieldList $fields): void
    {
        $fields->addFieldToTab('Root.Main',
            TextField::create('CustomField', 'Custom Field')
        );
    }
}
```

```yaml
Fromholdio\SuperLinkerTargets\Model\Target:
  extensions:
    - App\Extensions\TargetExtension
```

### Creating Subclasses

For specific use cases, create subclasses:

```php
namespace App\Model;

use Fromholdio\SuperLinkerTargets\Model\Target;

class SocialLink extends Target
{
    private static $table_name = 'App_SocialLink';

    private static $singular_name = 'Social Link';
    private static $plural_name = 'Social Links';

    private static $allowed_types = [
        'external'
    ];
}
```

## Alternative for New Projects

Instead of using this module, create your own link classes:

```php
namespace App\Model;

use Fromholdio\SuperLinker\Model\SuperLink;

class Link extends SuperLink
{
    private static $table_name = 'App_Link';

    private static $singular_name = 'Link';
    private static $plural_name = 'Links';
}
```

This gives you full control without an extra dependency.

## Documentation

For complete SuperLinker documentation, see:
- [SuperLinker README](../silverstripe-superlinker/README.md)
- [SuperLinker Technical Guide](../silverstripe-superlinker/augment.md)

## License

BSD-3-Clause

## Support

- **GitHub**: https://github.com/fromholdio/silverstripe-superlinker-targets
- **Issues**: https://github.com/fromholdio/silverstripe-superlinker-targets/issues
