## Add fees for specific shipping class categories
If you have set up shipping classes and assigned products to your shipping categories, then you can see here how to add fees for products from specific shipping classes.

# Installation
1. Copy over the code from functions.php to your functions.php copy of WordPress site.
2. You can remove [lines 40-45](functions.php#L40-L45).
3. For each shipping class you would like to add fee for, copy and paste [lines 46-48](functions.php#L46-L48).
4. Now simply update `'your-shipping-class-slug-here'` with your shipping class slug, `'Any text you would like to see as fee heading :'` with your text and `$fixed` with your preferred price.
