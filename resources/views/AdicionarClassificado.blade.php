
      <div class="col-md-9">
      <div class="dashboard_profile_main">
    <div class="dashboard_heding">
      <h3>Adicionar Seu anucios</h3>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-7">
      <div class="profile_detail">
        <h3>ad detail </h3>
        <form method="POST" enctype="multipart/form-data" id="upload_image_form" action="http://127.0.0.1:8000/api/classificados/create" >
          <div class="form-group">
            <label>Titulo do Anuncio</label>
            <input type="text"  id="Titulo" class="form-control Titulo" placeholder="Title" value="Manicure kelly manicure">
          </div>
          <div class="form-group selectdiv">
            <label>Categoria</label>
            <select class="form-control Categoria" id="Categoria" >
              <option>Selecione A categoria do Anuncio</option>
          
            </select>
          </div>
          <div class="form-group">
            <label>Preço</label>
            <input type="text"  class="form-control Preco" id="Preco" placeholder="Adicione Seu Preço" value="100">
          </div>
          
          <div class="img_browse">
            <label>Imagem do Anuncio</label>
            <div class="form-group">
              <div class="tg-fileuploadlabel">
              <img id="image_preview_container" src="{{ asset('storage/image/image-preview.png') }}">
              <div id="image_preview_container"></div>
                <label>Por favor Adicione suas Imagens</label>
                <input type="file" name="image" placeholder="Choose image" id="image">
                <span>Arquivos no maximo: 500 KB</span> </div>
            </div>
          </div>
          
          <div class="ad_description">
            <label>Descrição</label>
            <div class="form-group">
              <div class="ad_description_type">
                <div class="note-editor">
                  <div class="note-toolbar btn-toolbar">
                    <div class="form-group selectdiv m-0">
                      <select class="form-control ">
                        <option>Paragraph</option>
                        <option selected>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </select>
                    </div>
                    <div class="note-style btn-group">
                      <button type="button" class="btn btn-default btn-sm btn-small"><i class="fa fa-bold"></i></button>
                      <button type="button" class="btn btn-default btn-sm btn-small"><i class="fa fa-italic"></i></button>
                      <button type="button" class="btn btn-default btn-sm btn-small"><i class="fa fa-underline"></i></button>
                      <button type="button" class="btn btn-default btn-sm btn-small"><i class="fa fa-text-width"></i></button>
                    </div>
                    <div class="note-para btn-group border-left border-right">
                      <button type="button" class="btn btn-default btn-sm btn-small"><i class="fa fa-list-ul"></i></button>
                      <button type="button" class="btn btn-default btn-sm btn-small"><i class="fa fa-list-ol"></i></button>
                    </div>
                    <div class="note-height btn-group">
                      <button type="button" class="btn btn-default btn-sm btn-small"><i class="fa fa-chain-broken"></i></button>
                      <button type="button" class="btn btn-default btn-sm btn-small"><i class="fa fa-link"></i></button>
                    </div>
                  </div>
                  <textarea class="note-codable Descricao" id="Descricao">Muito lindo tudo isso</textarea>
                </div>
              </div>
            </div>
          </div>
          <button class="change_btn mt-2 text-capitalize cadastrar" type="submit">Cadastrar </button>
        </form>
      </div>
    </div>
    <div class="col-md-5">
      <div class="change_password">
        <h3>change password</h3>
        <form>
          <div class="form-group">
            <label>first name *</label>
            <input type="text"  class="form-control">
          </div>
          <div class="form-group">
            <label>last name *</label>
            <input type="text"  class="form-control">
          </div>
          <div class="form-group">
            <label>phone</label>
            <input type="tel"  class="form-control">
          </div>
          <div class="form-group">
            <label>enter address</label>
            <input type="tel"  class="form-control">
          </div>
          <div class="form-group selectdiv">
            <label>Country</label>
            <select class="form-control">
              <option>Select a Country</option>
              <option>india</option>
              <option>Russia</option>
              <option>Canada</option>
              <option>China</option>
            </select>
          </div>
          <div class="form-group selectdiv">
            <label>state</label>
            <select class="form-control">
              <option>Select a state</option>
              <option>rajasthan</option>
              <option>U P</option>
              <option>M P</option>
              <option>goa</option>
            </select>
          </div>
          <div class="form-group selectdiv">
            <label>city</label>
            <select class="form-control">
              <option>Select a city</option>
              <option>jaipur</option>
              <option>alwar</option>
              <option>bara</option>
              <option>kota</option>
            </select>
          </div>
          <button class="change_btn mt-2 text-capitalize" type="submit" value="button">ad postaa</button>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
</div>

<!-- End Dashboard_sec -->

