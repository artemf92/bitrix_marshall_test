<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
					</div> <!-- .container -->
				</section>
				<? if ($APPLICATION->GetCurPage() == '/') { ?>
					<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => "/include/newsletter.php"
						), false, ["HIDE_ICONS"=>"Y"]
					);?>
				<? } ?>
			</main>

			<? include __DIR__ . '/page-blocks/footer.php' ?>
		</div> <!-- .wrapper -->
	</body>
</html>