<footer class="footer">
		<div class="content_position">
			<div class="footer_info">
				<h2>Карпушева Ирина Александровна</h2>
				<p><i>Высшее образование, Нижегородский государственный педагогический университет им. Козьмы Минина. Десять лет педагогического стажа работы.	Первая квалификационная категория.</i></p>
				<p><a href="/sitemap/">Карта сайта</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/sitemap/">Ссылка 2</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/sitemap/">Ссылка 3</a></p><br>
				<!-- Yandex.Metrika informer -->
				<a href="https://metrika.yandex.ru/stat/?id=46875573&amp;from=informer"
				target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/46875573/3_1_FFFFFFFF_FFFFFFFF_0_pageviews"
				style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="46875573" data-lang="ru" /></a>
				<!-- /Yandex.Metrika informer -->
			</div>
			<nav class="footer_nav">
				<h2>Страницы сайта</h2>
				@include('includes.link')
			</nav>
			<form action="/api/mail/send" method="post" class="suv-ajax footer_feedback" id="mailSend">
				<input type="hidden" name="contact_secret" value="9320087105434084715">
				<h2>Напишите мне</h2>
				<div style="display: flex;">
					<p style="flex: 1;margin-right: 10px;"><input type="text" name="name" placeholder="Введите имя..."></p>
					<p style="flex: 1;margin-left: 10px;"><input type="email" name="email" placeholder="Введите E-mail..."></p>
    		</div>
				<p><textarea name="message" placeholder="Введите сообщение..."></textarea></p>
				<p><button type="submit">Отправить</button></p>
			</form>
		</div>
	</footer>