<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Casino_Theme
 * @since Casino Theme 1.0
 */
?>

<div class="center_content_left">

	<div class="sitebar_bl_one">
		<div class="sitebar_bl_one_title">Разработчики</div>
		<?php
		$args = array(
			'taxonomy'   => 'proizvoditeli',
			'hide_empty' => false,
		);
		$terms = get_terms( $args );
		$q = 0;
		foreach ( $terms as $term ) :
			if ( $q > 5 ) continue;
			$image = get_field('imgd', 'proizvoditeli_'.$term->term_id);
			echo '<a href="/proizvoditeli/'. $term->slug .'" title="'. $term->name .'" class="sitebar_bl_one_content_on"><img src="'. $image['sizes']['sk-small-2'] .'" alt="'. $term->name .'"/></a>';
			$q++;
		endforeach;
		?>
	</div>

	<div class="sitebar_bl_one">
		<div class="sitebar_bl_one_title">Сейчас выигрывают</div>
		<?php
		global $post;
		$postser = get_posts( array( 'numberposts' => 5, 'post_type' => 'igrovue-avtomatu','orderby' => 'rand' ) );
		foreach ( $postser as $post ) :
			setup_postdata( $post ); ?>
			<a href="<?php echo get_permalink( $pst->ID ); ?>" class="com_on">
				<div class="com_on_im"><img src="<?php echo get_the_post_thumbnail_url( $pst->ID, 'sk-small-3' ); ?>" alt="<?php echo $pst->post_title; ?>"></div>
				<div class="com_title"><?php trim_title_chars( 12, '...', $pst->post_title ); ?></div>
				<div class="com_pr"><?php echo rand( 70,250 ).' '; the_field( 'sgame', $pst->ID ); ?></div>
				<div class="com_title2">
					<?php
					$sknik = array('DUBLYOR', 'NASTRADAMUS', 'Иннoчкa_-MAMBO ', 'DYAVOL_no_DOBRIY ', 'NASTYA', 'Интeллигeнт ', 'Dagestanec ', 'NATALIA_ORIERO ', '-CAKO-M', 'DangeR ', 'NATHASA', 'ЛACKABA-Я', '-I_B_O ', 'DarkSteel ', 'NArgILa ', 'ЛE3ГИHЧИK ', 'AYDAN', 'Dasdafsdf', 'NEFTCI_PFK ', 'ЛУHA ', 'MARTIN ', 'Daywalker ', 'NEITRINO', 'ЛЯПOTA', '-ZAUR', 'DeHWeT ', 'NELLY', 'Лacкoвaя_пaнтepa', '-CIQAN ', 'DeLi', 'NELLY_FURTADO ', 'Лacкoвый_Бaкинeц ', '-NeMo ', 'DeaD_GirL ', 'NEQATIF', 'Лacтoчкa ', '-UREK', 'Deart-Wolf ', 'NERGIZ_132 ', 'Лaпyля ', '-CIQAN', 'DeatH ', 'NERPATOLUQ', 'Лaпкa ', '-KAKETKA ', 'Death_angel ', 'NEW_GIRL', 'Лeди', '-RIO- ', 'Dedmopo3 ', 'NEW_WORLD', 'Лeди_Бывaлый ', '-AZERBAYCAN', 'DelPiero ', 'NFS_Carbon ', 'Лeйлa ', '-Anarchik ', 'Delete1', 'NICAT.59', 'Лeнka ', '-Baksyor ', 'Delfin ', 'NIGAR', 'Лoлитa ', '-KILLER ', 'Desant016 ', 'NIGHTWOLF', 'Лyнa ', '-NAYOMNIK ', 'DeserT_eagLe ', 'NIGHT_HUNTER ', 'ЛyчщeЧeмAнгeль', '-_ANAR_- ', 'DetkA', 'NIKO_375', 'ЛиXaчь', '-ШAMAXИHEЦ', 'Detka ', 'NIL-ENS', 'Ликa ', '-_ANAR_- ', 'Devdas', 'NINJA ', 'Львинoe-cepдцe ', '-AZERI- ', 'Devushka_Jagoza ', 'NOD32 ', 'Люcькa ', '-BИPУC_666', 'DiKaRoChKa ', 'NONDA ', 'ЛюбoвьCлaдкийCoн ', '-Cмepть_Oн ', 'DiRecTor ', 'NUHANTE ', 'Любимчик-Я ', '-DMX_B- ', 'Diabolus666 ', 'NURIYEV ', 'Любитeль_кeкcoв', '-Fu_ADELL- ', 'Diams ', 'NURLAN_DRAGON ', 'Люди-инвaлиды ', '-MUZIK- ', 'Diana_84 ', 'NYUTON_A', 'ПATPИOT', '-RAMAL', 'Die_Hard ', 'NaRKo_BiZnES', 'ПCИX ', '-AГДAMEЦ-', 'Dina ', 'NaRkAmAn_789', 'ПEPBИ3ЦИK', '-CANAVAR-', 'Djamila', 'Nacnoy_Snayper', 'ПEPEДO3ИPOBKA', '-PROMETE', 'Dj_Dance', 'Naile', 'ПOTЯ', '-SexyBoy-', 'Dj_EmO', 'Naina', 'ПOБEГУHЧИK', '-4ClubberS- ', 'Dj_POLINA ', 'Nanit', 'ПOЛЬKA ', '-ANONIM-', 'Dj_Perviz', 'NapaleoN ', 'ПOЦEЛУЙ_ДPAKOHA ', '-BRATELNIK- ', 'Dj_SkypeGirl ', 'Narin_Yagish ', 'ПOдeльHИK ', '-D-R-A-K-O-N-', 'DoDaqDan_QelBe', 'Narkaman_8km', 'ПPACЛABЛEHHЫЙ', '-EvA- ', 'DodgeR ', 'Narkaman_Lubvi ', 'ПPOДЮCEP ', '-GladiatoR- ', 'Doktor_Elcan', 'Narmina ', 'ПPИЩИK ', '-JVC- ', 'DolmakimiOglan', 'Nastinka', 'ПapeньБeзДeвyшки', '-KATALA- ', 'DonJuan89 ', 'Nasty_Girl');
					$random_number = rand( 0, count( $sknik ) - 1 );
					trim_title_chars( 10, '...', $sknik[$random_number] );
					?>
				</div>
			</a>
			<div class="poz"></div>
		<?php endforeach; ?>
	</div>

	<div class="sitebar_bl_one">
		<div class="sitebar_bl_one_title unik">Новости</div>
		<?php
		$my_posts = new WP_Query;
		$myposts  = $my_posts->query( array(
			'post_type'      => 'stati',
			'posts_per_page' => '5'
		) );
		$r = 0;
		foreach ( $myposts as $pst ) :
			if ( $r > 4 ) continue;
			if ( $r > 1 ) echo ', ';
			?>
			<div class="com_on">
				<div class="coms_title"><a href="<?php echo get_permalink( $pst->ID ); ?>" title="<?php echo $pst->post_title; ?>"><?php echo $pst->post_title; ?></a></div>
			</div>
			<div class="poz"></div>
			<?php
			$r++;
		endforeach; ?>
	</div>

</div>