{if $smarty.request.package == 1 OR $user->jog == '1'}
    <div class="kiemelt" style="width: 163px; left: 213px; background-color: #8CFA80; border-bottom: 2px solid #009222;"></div>
{/if}      
{if $smarty.request.package == 2 OR $user->jog == '2'}
    <div class="kiemelt" style="width: 161px; left: 378px; background-color: rgba(208, 229, 245, 1); border-bottom: 2px solid #A1C3DB;"></div>
{/if}     
{if $smarty.request.package == 3 OR $user->jog == '3'}
    <div class="kiemelt"></div>
{/if}  
{if $smarty.request.package == 4 OR $user->jog == '4'}
    <div class="kiemelt" style="width: 147px; left: 689px; background-color: #999; border-bottom: 2px solid #777777;"></div>
{/if}    