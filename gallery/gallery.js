function expand_image(image)
{
	var expand_img = document.getElementById('expanded_img');

	var img_text = document.getElementById('img_desc');

	expand_img.src = image.src;

	img_text.innerHTML = image.alt;

	expand_img.parentElement.style.display = 'block';
}
