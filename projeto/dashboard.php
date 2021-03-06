<section class="box conteudo conteudo-completo">
    <br>
    <?php if ($usuario_['ilmd'] <> "" and $usuario_['nome'] <> "" and $usuario_['cpf'] <> "") : ?>
    <p style="color: green; float: left; font-size: 1.1em; margin-top: 0.5%;">Senha e cadastro atualizados</p>
    <?php else : ?>
    <p style="color: red; float: left; font-size: 1.1em; margin-top: 0.5%;">Por favor, altere a senha!</p>
    <?php endif; ?>
    <a href="" class="btn btn_green fl-right cadastrar3" style=" width: 17%; margin-top: 0%">
        <figure class="icon-plus6" style="font-size: 1.1em; margin-top: -0.6%; margin-right: 2%;"></figure> Editar Perfil
    </a>
    <div class="limpar"></div>
    <br>

    <article class="box box100" style="background: #fff;">
        <div class="box_div_h1">
            <h1 class="box_h1">Projetos em Andamento</h1>
        </div>
        <div class="box_conteudo_">
            <a href="" class="btn btn_green fl-right cadastrar" style=" width: 15%; margin-top: 0%">
                <figure class="icon-plus6" style="font-size: 1.1em; margin-top: -0.6%; margin-right: 2%;"></figure> Cadastrar Projeto
            </a>
            <div class="limpar"></div>
            <br>
            <?php
      $listagem = new Read;
      $listagem->ExeRead('aluno', 'WHERE status = :tipo and id_orientador = "' . $usuario_['id'] . '"order by id desc', "tipo=1");
      if ($listagem->getRowCount() >= 1) :
        foreach ($listagem->getResult() as $listagem_);
      ?>
            <!--<p class="texto_form" style=" margin-top: 0;">Você pode ordenar a lista clicando nos titulos da lista abaixo.</p> -->
            <table class="lista_base_tabela sortable">
                <!--<caption></caption>-->
                <tr style=" width: 100%; border-bottom: 1px solid #000; background-color: #000000; color: #FFF; font-size: 0.9em;">
                    <!-- <th width="9%" style=" text-align: center; padding: 1%;">Imagem</th> -->
                    <th width="30%" style=" text-align: center; padding: 1%;">Nome</th>
                    <!-- <th width="30%" style=" text-align: center; padding: 1%;">E-mail</th> -->
                    <th width="15%" style=" text-align: center; padding: 1%;">CPF</th>
                    <th width="15%" style=" text-align: center; padding: 1%;">Curso</th>
                    <th width="15%" style=" text-align: center; padding: 1%;">Status</th>
                    <th width="1%" style="padding: 0%;"></th>
                    <!-- <th width="1%" style="padding: 0%"></th>
            <th width="1%" style="padding: 0%"></th> -->
                </tr>
                <div class="limpar"></div>
                <?php
          foreach ($listagem->getResult() as $listagem_) :
            //if ($listagem_['avatar'] == ''):
            //   $avatar = Check::Imagem('imagens_fixas/sem_imagem.jpg', 'Sem imagem', '500', '500', '');
            //else:
            //   $avatar = '<img src="' . SITE . 'imagens_site/' . $listagem_['avatar'] . '" title="' . $listagem_['nome'] . '"width="500"/>';
            //endif;
          ?>
                <tr class="lista_tabela">
                    <td width="30%" data-balloon-length="large" data-balloon="<?= $listagem_['nome']; ?>" data-balloon-pos="up"><?= Check::limitcaracter($listagem_['nome'], 36); ?></td>
                    <td width="15%"><?= $listagem_['cpf']; ?></td>
                    <td width="15%"><?= $listagem_['curso']; ?></td>
                    <td width="15%">
                        <?php
                if ($listagem_['block'] == '1') :
                ?>
                        <p>Cadastro finalizado</p>
                        <?php
                else :
                ?>
                        <p>Aguadando finalização</p>
                        <?php
                endif;
                ?>
                    </td>
                    <td width="1%">
                        <div class="ver_cadastro btn btn-block" style="" id="<?= $listagem_['id']; ?>" data-balloon-length="small" data-balloon="Ver cadastro" data-balloon-pos="up">
                            <figure class="icon-user8" style="font-size: 1.3em;"></figure>
                        </div>
                    </td>

                    <!--<td width="1%">
                <div class="cad_cordenador btn btn_blue" style="" id="<? //= $listagem_['id']; 
                                                                      ?>" data-balloon-length="small" data-balloon="Co-cordenador" data-balloon-pos="up">
                  <figure class="icon-user8" style="font-size: 1.3em;"></figure>
                </div>
              </td> -->
                    <!--  <td width="1%">
                  <div class="id_aluno_alt btn btn_green" style="" id="<? //= $listagem_['id']; 
                                                                        ?>" data-balloon-length="small" data-balloon="Alterar" data-balloon-pos="up">
                    <figure class="icon-edit-3" style="font-size: 1.3em;"></figure>
                  </div>
                </td> -->
                    <!--<td width="1%">
                <div class="btn btn_red excluir_modal" data-excluir="ex_aluno" id="<? //= $listagem_['id']; 
                                                                                    ?>" style="" data-balloon-length="small" data-balloon="Excluir" data-balloon-pos="up">
                  <figure class="icon-close2" style="font-size: 1.3em;"></figure>
                </div>
              </td> -->
                    <div class="limpar"></div>
                </tr>
                <?php
          endforeach;
        else :
          echo '<div class="list" style="color: #000; font-size: 1.1em;"><center>Não há projetos em andamento!</center></div>';
        endif;
        ?>
                <div class="limpar"></div>
            </table>
        </div>
    </article>

    <div class="limpar"></div>
    <br>
</section>

<!--CADASTROS /////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="cadastrar_total">
    <a href="" style="text-align: center;" data-balloon-length="small" data-balloon="Fecha" data-balloon-pos="left" class="fecha_moldura2 fecha_cadastro">
        <figure class="icon-window-close" style="color: #fff;"></figure>
    </a>
    <div class="cadastrar_total_contetudo" style=" background: #fff; padding: 3%">
        <h1 class="topo_modal">Cadastrar Projeto</h1>
        <form class="form_linha" method="post" name="cad_alunos">
            <div class="box box100">
                <div class="box box33">
                    <p class="texto_form">Título<font color=red>*</font>
                    </p>
                    <input name="nome" type="text" required placeholder="Título do Projeto" style=" width: 100%;" />
                </div>
                <div class="box box33">
                    <p class="texto_form">Tipo <font color=red>*</font>
                    </p>
                    <input name="curso" type="text" required placeholder="Tipo de Projeto" style=" width: 100%;" />
                </div>
                <div class="box box33 no-margim">
                    <p class="texto_form">Entrega <font color=red>*</font>
                    </p>
                    <input name="faculdade" type="text" required placeholder="Data de Entrega do Projeto" style=" width: 100%;" />
                </div>
                <div class="limpar"></div>

                <div class="box box33">
                    <p class="texto_form">Custo <font color=red>*</font>
                    </p>
                    <input name="cpf" type="text" placeholder="Custo em Reais para a aplicação do Projeto" autocomplete="off" style=" width: 100%;" id="mascara_cpf" />
                </div>
                <div class="box box33">
                    <p class="texto_form">Retorno<font color=red>*</font>
                    </p>
                    <input name="cr" type="text" maxlength="10" placeholder="Reotorno financeiro" id="coe" style=" width: 100%;" />
                </div>
                <div class="box box33 no-margim">
                    <p class="texto_form">Responsavel<font color=red>*</font>
                    </p>
                    <select class="seletipo" name="tipo" style=" width: 100%;">
                        <option value="1">Luciano Soares Nunes</option>
                        <option value="2">Rafaela Rocha</option>
                        <option value="3">Oziel Cavalcante</option>
                    </select>
                </div>

                <div class="box box100">
                    <p class="texto_form">Parecer/protocolo do Comitê de Ética (CEP) <font color=red></font>
                    </p>
                    <!-- <label class="label_file" for='selecao-arquivo2'>Selecionar um arquivo</label> -->
                    <input id='' type="file" name="user_thumb2" class="" style=" display: block; width: 100%; border: 1px solid #b1b1b1; padding: 1%" />
                </div>

                <div class="limpar"></div>

                <div class="forms_exta ds-none" style=" width: 100%; padding: 2%; background: #f1f1f1; border: 0.9% solid #333;"></div>

                <div class="limpar"></div>

            </div>

            <!-- aluno -->


            <br>
            <!--Co-orientado-->

            <br>

            <input type="hidden" name="id" value="<?= $usuario_['id']; ?>" />
            <span class="carregando2 ds-none"><img src="<?= HOME; ?>imagens_fixas/carregando2.gif" /></span>
            <br>
            <br>
            <button class="btn btn_green fl-left" style="font-size: 0.8em; margin-right: 1%">
                <figure class="icon-save2" style="margin-top: -6%;"></figure> Cadastrar
            </button>
            <div class="limpar"></div>
        </form>

    </div>
    <div class="limpar"></div>
</div>

<div class="cadastrar_total2">
    <a href="" style="text-align: center;" data-balloon-length="small" data-balloon="Fecha" data-balloon-pos="left" class="fecha_moldura2 fecha_cadastro2">
        <figure class="icon-window-close" style="color: #fff;"></figure>
    </a>

    <div class="limpar"></div>
</div>
<!-- Alterar Cadastro -->
<div class="cadastrar_total3">
    <a href="" style="text-align: center;" data-balloon-length="small" data-balloon="Fecha" data-balloon-pos="left" class="fecha_moldura2 fecha_cadastro3">
        <figure class="icon-window-close" style="color: #fff;"></figure>
    </a>
    <div class="cadastrar_total_contetudo3" style=" background: #fff; padding: 3%">
        <h1 class="topo_modal">Alterar cadastro</h1>
        <form class="form_linha" method="post" name="alterar_orientador">
            <div class="box box100">
                <div class="box box20">
                    <p class="texto_form">Nome completo (obrigatório)</p>
                    <input name="nome" type="text" required placeholder="Nome completo" value="<?= $usuario_["nome"]; ?>" style=" width: 100%;" />
                </div>
                <div class="box box20">
                    <p class="texto_form">Vínculo com o ILMD (obrigatório)</p>
                    <input name="ilmd" type="text" required placeholder="Vínculo com o ILMD" value="<?= $usuario_["ilmd"]; ?>" style=" width: 100%;" />
                </div>
                <div class="box box20 ">
                    <p class="texto_form">E-mail (obrigatório)</p>
                    <input name="email" type="email" required placeholder="E-mail" value="<?= $usuario_["email"]; ?>" style=" width: 100%;" />
                </div>
                <div class="box box20">
                    <p class="texto_form">CPF (obrigatório)</p>
                    <input name="cpf" type="text" placeholder="CPF" autocomplete="off" value="<?= $usuario_["cpf"]; ?>" style=" width: 100%;" id="mascara_cpf2" />
                </div>
                <div class="box box20 no-margim">
                    <p class="texto_form">Alterar senha</p>
                    <input name="senha" type="password" placeholder="Senha" autocomplete="off" value="<?= $usuario_["senha"]; ?>" style=" width: 100%;" id="" />
                </div>
                <div class="limpar"></div>
            </div>

            <div class="limpar"></div>
            <br>
            <input type="hidden" name="id" value="<?= $usuario_['id']; ?>" />
            <span class="carregando2 ds-none"><img src="<?= HOME; ?>imagens_fixas/carregando2.gif" /></span>
            <button class="btn btn_green fl-left" style="font-size: 0.8em; margin-right: 1%">
                <figure class="icon-save2" style="margin-top: -6%;"></figure> Salvar
            </button>
            <div class="limpar"></div>
        </form>
    </div>
    <div class="limpar"></div>
</div>

<!-- ALTERAÇÃO /////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="alterar_total">
    <a href="" style="text-align: center;" data-balloon-length="small" data-balloon="Fecha" data-balloon-pos="left" class="fecha_moldura2">
        <figure class="icon-window-close" style="color: #fff;"></figure>
    </a>
    <div class="alterar_total_contetudo" style=" background: #fff; padding: 3%">

    </div>
    <div class="limpar"></div>
</div>
