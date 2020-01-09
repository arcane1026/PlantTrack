<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
Hi <!--?php echo $user['first_name'] . ' ' . $user['last_name'] ?-->,

Congratulations on your new PlantTrack account!

Please click this link to confirm your email address: <a href="<!--? echo $_SERVER['HTTP_HOST'] . '/confirm-email/' . sha1($user['id'] . '' . $user['created']) ?-->">Confirmation Link</a>'

Thanks,

The PlantTrack Team
