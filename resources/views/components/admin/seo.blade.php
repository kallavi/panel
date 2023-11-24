<div class="card card-flush py-4 bg-gray-300 bg-opacity-20 border-0">
    <div class="card-header" >
        <div class="card-title">
            <h2>SEO</h2>
        </div>
    </div>

    <div class="card-body">

        <div class="input-group-lg mb-6">
            <label for="seo_keywords{{isset($lang) ? '_'.$lang : ''}}" class="form-label">Etiketler</label>
            <input type="text" class="form-control customTagify" name="seo_keywords{{isset($lang) ? ':'.$lang : ''}}" id="seo_keywords{{isset($lang) ? '_'.$lang : ''}}" placeholder="Anahtar Kelime">
        </div>
        <div class="input-group-lg mb-6">
            <label for="seo_description{{isset($lang) ? '_'.$lang : ''}}" class="form-label">Sayfa Açıklaması</label>

            <textarea name="seo_description{{isset($lang) ? ':'.$lang : ''}}" id="seo_description{{isset($lang) ? '_'.$lang : ''}}" rows="4" class="form-control" placeholder="Açıklama Girin" style="resize:none"></textarea>
        </div>
    </div>
  
</div>