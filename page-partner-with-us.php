<?php
  // https://docs.google.com/document/d/1CIJL-Scse7gILbH5Ij4avGOm5x4n2DZMKOWJl9f-u-Y/edit
  //response generation function
  $response = "";

  //function to generate response
  function contact_form_generate_response($type, $message){
    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";
  }

  //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "Please supply all information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $org = $_POST['message_org'];
  $message = $_POST['message_text'];
  $human = $_POST['message_human'];

  //php mailer variables
  $to = get_option('admin_email');
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: '. $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";

  if(!$human == 0){
    if($human != 2) {contact_form_generate_response("error", $not_human);} //not human!
    else {
      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        contact_form_generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name, organization, and message
        if(empty($name) || empty($org) || empty($message)){
          contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $message = "Sender: " . $name . " (" . $email . ")\r\n" . "Organization/Position: " . $org . "\r\n" . $message;
          $sent = wp_mail($to, $subject, strip_tags($message), $headers);
          if($sent) {contact_form_generate_response("success", $message_sent);} //message sent!
          else contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }
  else if ($_POST['submitted']) contact_form_generate_response("error", $missing_content);

?>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DFA - Partner With Us</title>
  <?php get_header(); ?>
</head>

<?php echo $response; ?>
<br/><br/><br/><br/>
<table width="100%">
<tr>
<td width="5%"><img src="https://static.thenounproject.com/png/137789-200.png" style="max-width: 100px; height: auto;"/></td>
<td width="95%"><h3>What does DFA do?</h3>
<p>Design for America is a Design Research group that is part of a nationwide network of design thinking studios on college campuses. We take a deep look into an area of interest co-defined with our community partners, using human-centered design as framework for evaluation and the generation of constructive insights. 

Projects usually run for a semester and are staffed by interdisciplinary student teams. As college students, we recognize we are often constrained in producing elaborate prototypes or implementation. Thus, the scope of our work is mostly limited to the generation of insights and ideas that can lend our community partners a more refined understanding of the focus area. 

Sometimes, a clear solution is realized where DFA is able to support implementation. In such cases, student teams work more extensively on prototyping and implementation. Such instances are more limited and often require multi-semester partnerships.
</p></td>
</tr>
<tr>
<td width="5%"><img src="https://static.thenounproject.com/png/3203556-200.png" style="max-width: 100px; height: auto;" /></td>
<td width = "95%"> <h3>What might your organization gain from a partnership with DFA?</h3>
<p>While a partnership with DFA might occasionally result in the implementation of a tangible product or solution, often it is a means for identifying and gaining further insight into a given area of focus. DFA students can spend time looking extensively into an area an organization may not have the time or resources to explore in detail. 

We spend an entire semester immersing ourselves in the area of focus, conducting research, engaging with community members, identifying insights, brainstorming possible approaches and testing those ideas with community members through simple prototypes. An end deliverable might include a documentation of interview insights, an illumination of the focus area, possible approaches including the community's reactions, and our team's recommendation.
</p></td>
</tr>
<tr>
<td width="5%"><img src="https://static.thenounproject.com/png/968000-200.png" style="max-width: 100px; height: auto;" /></td>
<td width = "95%"> <h3>What types of partners do we work with?</h3>
<p>DFA WashU typically works with nonprofits and others working to further social impact in the St. Louis region. As a studio containing students of multidisciplinary interests, we are open to working on a wide variety of issues. Some of our past projects have touched on issues relating to public health, criminal justice and voting. 

We are excited to engage with partners who could find value in the application of the human-centered design process. As our process centers on engagement with and feedback from members of the community, we hope to work with partners who are able to support consistent communication with our student teams. 
</p>
</td>
</tr>
<tr>
<td width="5%"><img src="https://static.thenounproject.com/png/2871276-200.png" style="max-width: 100px; height: auto;" /></td>
<td width = "95%">
<h3>How to become a partner:</h3>
<p>Thank you for considering engaging with us. Please fill out the form below and we will be in touch with you within 1-3 days.  

Our studio leadership will reach out for a listening session so we might better understand your needs and how the human-centered design process might fit them. 

In addition, we will facilitate conversations with studio members to gauge interest and match a student team to your organization. Even if we are unable to presently take on a project with you, we will ensure to stay in touch in case future opportunities for a partnership arise.
</p>
</td>
</tr>
</table>

<h3>Measures We Take to Mitigate Harm</h3>
<p>[ THIS IS PLACEHOLDER TEXT FOR NOW. WE ARE LOOKING FOR GREATER INPUT IN TERMS OF WHAT WE CAN DO FOR THIS –– We were thinking things like an exit plan, providing some form of deliverables, maintaining consistent communication with our partners, etc. ]</p>

<h3>Resources for Community Partners</h3>
<table width="100%">
  <tr>
  <td width="33.3%">Faciliating a Sprint Design</td>
  <td width="33.3%">Blog Articles Related to Human Centered Design</td>
  <td width="33.3%">Photo Updates</td>
  </tr>
</table>

<h3>Contact Us</h3>
<!-- Contact form -->
<?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

    <div class="entry-content">
        <?php the_content(); ?>

        <style type="text/css">
        .error{
            padding: 5px 9px;
            border: 1px solid red;
            color: red;
            border-radius: 3px;
        }

        .success{
            padding: 5px 9px;
            border: 1px solid green;
            color: green;
            border-radius: 3px;
        }

        form span{
            color: red;
        }
        </style>

        <div id="respond">
        <form action="<?php the_permalink(); ?>" method="post">
            <p><label for="name">Name: <span>*</span> <br><input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>"></label></p>
            <p><label for="message_email">Email: <span>*</span> <br><input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"></label></p>
            <p><label for="message_org">Organization/Position: <span>*</span> <br><input type="text" name="message_org" value="<?php echo esc_attr($_POST['message_org']); ?>"></label></p>
            <p><label for="message_text">Message: <span>*</span> <br><textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></label></p>
            <p><label for="message_human">Human Verification: <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>
            <input type="hidden" name="submitted" value="1">
            <p><input type="submit"></p>
        </form>
        </div>


    </div><!-- .entry-content -->

    </article><!-- #post -->

<?php endwhile; // end of the loop. ?>


<?php get_footer();?>