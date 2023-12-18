<?php

namespace Cwa\SyliusExamplePlugin\Form;

use DateTimeZone;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;

class PageLegalNoticeType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('enabled', CheckboxType::class, [
                'required'      => false,
                'label'         => "En ligne"
            ])
            ->add('name', TextType::class, [
                'label'         => false,
                'required'      => true,
                'attr'          => array(
                    'placeholder'   => "Nom du partenaire"
                )
            ])
            ->add('content', CKEditorType::class, [
                'label'         => false,
                'required'      => true,
                'config_name'   => 'partner_config',
                'attr'          => array(
                    'placeholder'   => 'app.form.partner.description.content'
                )
            ])
            ->add('updatedAt', DateTimeType::class, [
                'required'      => true,
                'input'         => 'datetime_immutable',
                'label'         => 'app.pages.update_date',
                'date_widget'   => 'single_text',
                'time_widget'   => 'single_text',
                'required'      => false,
                'data'          => new \DateTimeImmutable('now', new DateTimeZone('Europe/Paris')),
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'app_page_legal_notice';
    }
}
