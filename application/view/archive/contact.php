<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php print $contact->fname; ?></title>
    </head>
    <body>
        <h1><?php print $contact->fname; ?></h1>
        <div>
            <span class="label">Phone:</span>
            <?php print $contact->mobile; ?>
        </div>
        <div>
            <span class="label">Email:</span>
            <?php print $contact->email; ?>
        </div>
        <div>
            <span class="label">Address:</span>
            <?php print $contact->college; ?>
        </div>
    </body>
</html>
