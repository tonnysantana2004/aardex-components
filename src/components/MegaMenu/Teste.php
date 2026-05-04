<?php

namespace AARDEX\Components\MegaMenu;

class Teste {

    // -------------------------------------------------------------------------
    // Public API
    // -------------------------------------------------------------------------

    public static function make(): string {

        $menu = MegaMenuComponent::make();
        $menu->add_items( self::build_first_level_items() );

        return $menu->render();
    }

    // -------------------------------------------------------------------------
    // Tree builder
    // -------------------------------------------------------------------------

    public static function build_tree(): array {

        $flat_items = wp_get_nav_menu_items( 3 );
        $map        = [];
        $tree       = [];

        foreach ( $flat_items as $item ) {

            if ( empty( $item ) ) {
                continue;
            }

            $item->children   = [];
            $map[ $item->ID ] = $item;
        }

        foreach ( $map as $id => $item ) {
            if ( $item->menu_item_parent == 0 ) {
                $tree[] = &$map[ $id ];
            } else {
                if ( isset( $map[ $item->menu_item_parent ] ) ) {
                    $map[ $item->menu_item_parent ]->children[] = &$map[ $id ];
                }
            }
        }

        return $tree;
    }
    // -------------------------------------------------------------------------
    // Private builders — each method handles exactly one level
    // -------------------------------------------------------------------------

    private static function build_first_level_items(): array {

        $items = [];

        foreach ( self::build_tree() as $node ) {

            $item = FirstLevelItem::make( $node->title );

            if ( ! empty( $node->children ) ) {
                $item->add_pannel( self::build_pannel( $node ) );
            }

            $items[] = $item;
        }

        return $items;
    }

    private static function build_pannel( object $node ): Pannel {

    $pannel = Pannel::make([
        'label'          => 'Panel for ' . $node->title,
        'see_all_button' => [
            'label' => 'See all ' . $node->title,
            'link'  => $node->url,
        ],
        'pannel_id' => wp_unique_id( 'aardex-mega-menu-pannel-' ),
    ]);

    $pannel->add_items( self::build_groups( $node->children, true ) ); // ← com label

    return $pannel;
}

    private static function build_groups( array $group_nodes, bool $with_label = false ): array {

    $groups = [];

    foreach ( $group_nodes as $group_node ) {

        $label = $with_label ? $group_node->title : null;

        $group = ItemsGroup::make( $label );
        $group->add_items( self::build_second_level_items( $group_node->children ) );

        $groups[] = $group;
    }

    return $groups;
}

    private static function build_second_level_items( array $nodes ): array {

        $items = [];

        foreach ( $nodes as $node ) {
                
            $item = SecondLevelItem::make( $node->title ?? null);

            if ( ! empty( $node->children ) ) {
                $item->add_pannel( self::build_sub_pannel( $node ) );
            }

            $items[] = $item;
        }

        return $items;
    }

   private static function build_sub_pannel( object $node ): Pannel {

    $pannel = Pannel::make([
        'label'          => 'Panel for ' . $node->title,
        'see_all_button' => [
            'label' => 'See all ' . $node->title,
            'link'  => $node->url,
        ],
        'pannel_id' => wp_unique_id( 'aardex-mega-menu-pannel-' ),
    ]);

    $pannel->add_items( self::build_groups( $node->children, false ) ); // ← sem label

    return $pannel;
}


    private static function build_third_level_items( array $nodes ): array {

        return array_map(
            fn( $node ) => ThirdLevelItem::make( $node->title ),
            $nodes
        );
    }
}