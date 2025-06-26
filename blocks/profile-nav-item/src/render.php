<?php
	/**
	 * Plugin Name:       Profile Nav Item
	 * Description:       Displays a nav item that opens a dropdown with links to the user's profile, their revisions, onboardings and the logout page.
	 */
?>


<?php
	// Get current user
	$user = wp_get_current_user();

	// Get user ID
	$user_id = $user->ID;

	// Get user role
	$user_role = $user->roles[0];

	// Format user role
	$formatted_user_role = ($user_role == "administrator") ? "Admin" : (($user_role == "um_team") ? "Team" : (($user_role == "um_moderator") ? "Moderator" : null));

	// Get user display name
	$user_display_name = $user->display_name;

	// Get user avatar
	$user_avatar = get_avatar_url($user_id);

	// User profile URL
	$user_profile_url = "/user/" . $user->user_nicename;
?>

<li class="nav-item dropdown">
	<button class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Profil von <?php echo $user_display_name; ?>" aria-label="Profil von <?php echo $user_display_name; ?>" type="button">
		<img src="<?php echo $user_avatar; ?>" class="nav-item-avatar" width="32" height="32" alt="Profilbild von <?php echo $user_display_name; ?>">
	</button>
	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<div class="user-info">
			<div class="user-name"><?php echo $user_display_name; ?></div>
			<div class="user-role <?php echo lcfirst($formatted_user_role) ?>"><?php echo $formatted_user_role; ?></div>
		</div>
		<span class="divider"></span>
		<a class="dropdown-item" href="<?php echo $user_profile_url; ?>">Mein Profil</a>
		<a class="dropdown-item" href="<?php echo $user_profile_url; ?>/revisionen">Revisionen</a>
		<a class="dropdown-item" href="<?php echo $user_profile_url; ?>/schulungen">Schulungen</a>
		<span class="divider"></span>
		<a class="dropdown-item" href="/logout">Logout</a>
	</div>
</li>
